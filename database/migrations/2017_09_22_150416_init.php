<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class init extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){
           $table->increments("id");
           $table->string("name");
           $table->timestamps();
        });

        Schema::create('input_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->integer("type_id")->referenced("id")->on("input_type");
            $table->timestamps();
        });

        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments("id");
            $table->json("data");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
