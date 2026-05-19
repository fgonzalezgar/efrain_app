<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
        'name',
        'document',
        'email',
        'phone',
        'specialty',
        'role',
        'location',
        'resume',
        'permissions',
        'status',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
