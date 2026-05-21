<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
        'department_id',
        'municipality_id',
        'address',
        'responsible_id',
        'initial_status',
        'bureau',
        'notes',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function responsible()
    {
        return $this->belongsTo(Responsible::class);
    }
}
