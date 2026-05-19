<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Municipality;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('data/colombia.json'));
        $data = json_decode($json, true);

        // Limpiar tablas para evitar duplicados si se corre varias veces
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Municipality::truncate();
        Department::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($data as $index => $deptoData) {
            // Generar un código DIAN simulado para departamento (ej: 01, 02, ..., 32)
            $deptoCode = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            
            $department = Department::create([
                'code' => $deptoCode,
                'name' => $deptoData['departamento'],
            ]);

            $ciudades = $deptoData['ciudades'] ?? [];
            foreach ($ciudades as $cityIndex => $cityName) {
                // Generar código DIAN simulado para municipio (ej: 01001)
                $cityCode = $deptoCode . str_pad($cityIndex + 1, 3, '0', STR_PAD_LEFT);
                
                Municipality::create([
                    'department_id' => $department->id,
                    'code' => $cityCode,
                    'name' => $cityName,
                ]);
            }
        }
    }
}
