<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    protected $connection=mysqli_connect("localhost",'phpmyadmin@localhost','fruitfulbough','blog');
}
