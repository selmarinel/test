<?php

use Illuminate\Database\Seeder;

class initTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ["id" => 1, "name" => "text"],
            ["id" => 2, "name" => "number"],
            ["id" => 3, "name" => "checkbox"],
            ["id" => 4, "name" => "radio"],

        ];
        foreach ($types as $type){
            \App\Model\FieldTypes::query()->create($type);
        }



    }
}
