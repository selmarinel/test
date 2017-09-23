<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = "feedbacks";
    protected $fillable = ["data"];
}