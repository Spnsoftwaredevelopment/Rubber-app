<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mdrs extends Model
{
    use HasFactory;

    protected $fillable = [
        'ml',
        'mh',
        'ts1',
        'ts2',
        'tc50',
        'tc90',
        'mdrs_description',
        'filemdr',
        'rubber_id',
    ];
}


