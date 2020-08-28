<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table="histories";
    public $primarykey='user_id';
    public $timestamps=true;
}
