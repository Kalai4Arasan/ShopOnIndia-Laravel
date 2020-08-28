<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buy extends Model
{
    //table
    protected $table ='buys';
    //primary key
    public $primary_key='id';
    //timestamps
    public $timestamps=true;

    //Function for model:
    public function user(){
        return $this->belongsTo('App\User');
    }
}
