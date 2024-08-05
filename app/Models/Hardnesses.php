<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardnesses extends Model
{
    use HasFactory;

    protected $fillable = ['hts1', 'hts2', 'hts3', 'type', 'hardnesses_description', 'rubber_id'];
}
