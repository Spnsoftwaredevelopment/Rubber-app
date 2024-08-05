<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubber extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';



    public function material(){
        return $this->belongsTo('App\Models\Material');
    }

    protected $fillable = [
        'name_formula',
        'hardness_s',
        'hardness_e',
        'customer_id',
        'product_id',
        'ref',
        'description',
        'updated_by',
        'status',
        'save_data',
        'inspection',
        'isDelete',
        'approve_by',
        'start_date',
        'testlab_id'
    ];



}
