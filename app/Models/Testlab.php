<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testlab extends Model
{
    use HasFactory;

    protected $fillable = ['materail_id', 'mdrs_id', 'tensiles_id', 'hardness_id', 'rubber_id'];

    protected $casts = [
        'id' => 'integer', // Change this to the appropriate data type
    ];

    public function mdrs()
    {
        return $this->belongsTo(Mdrs::class, 'mdrs_id');
    }
}
