<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tensiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'thicknees',
        'width',
        'length',
        'max_force',
        'max_stress',
        'modules',
        'break',
        'tensiles_description',
        'filetensile',
        'rubber_id',
    ];
}
