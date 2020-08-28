<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //table
    protected $table ='orders';
    //primary key
    public $primary_key='id';
    //timestamps
    public $timestamps=true;
}
