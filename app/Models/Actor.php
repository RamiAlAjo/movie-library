<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['name', 'birth_date'];

    // Add the attribute casting here
    protected $casts = [
        'birth_date' => 'datetime',
    ];
}
