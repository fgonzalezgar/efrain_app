<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'fecha_apertura' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function responsible()
    {
        return $this->belongsTo(Responsible::class);
    }
}
