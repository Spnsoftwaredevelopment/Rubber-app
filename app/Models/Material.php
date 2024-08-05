<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';


    public function ruber(){
        return $this->hasMany('App\Models\Rubber');
    }

    protected $fillable = ['record_id', 'weights', 'other_id', 'testlab_id'];

}
