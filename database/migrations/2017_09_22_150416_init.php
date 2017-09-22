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
        Schema::create('feedback_field_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('feedback_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->integer("type_id")->referenced("id")->on("feedback_field_type");
            $table->text('rules')->nullable();
            $table->timestamps();
        });

        Schema::create('feedback_form',function (Blueprint $table){
            $table->increments('id');
            $table->integer("feedback_id");
            $table->text("value");
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
