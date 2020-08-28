<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';
    public $primarykey='prod_id';
    public $timestamps=true;
}
