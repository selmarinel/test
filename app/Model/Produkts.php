<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Produkts extends Model
{
    protected $fillable = ["name"];

    protected $table = "products";
}