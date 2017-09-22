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
        $products = [
            ["name" => "Staubsauger X150"],
            ["name" => "Waschmaschine 5000"],
            ["name" => "Telefon Berry 3"],
        ];
        foreach ($products as $product) {
            \App\Model\Produkts::query()->create([$product]);
        }


        foreach ($types as $type) {
            \App\Model\FieldTypes::query()->create($type);
        }

    }
}
