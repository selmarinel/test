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

        $types = [
            ["id" => 1, "name" => 'gender'],
            ["id" => 2, "name" => 'alter'],
            ["id" => 3, "name" => 'product'],
            ["id" => 4, "name" => 'cost'],
            ["id" => 5, "name" => 'checkbox'],
            ["id" => 6, "name" => 'rating'],
            ["id" => 7, "name" => 'autocomplete'],
        ];
        foreach ($types as $type) {
            \App\Model\Input\Type::query()->create($type);
        }

        $fields = [
            ["name" => "Geschlecht", "type_id" => \App\Model\Input\Type::GENDER],
            ["name" => "Alter", "type_id" => \App\Model\Input\Type::ALTER],
            ["name" => "Produkte", "type_id" => \App\Model\Input\Type::PRODUCT],
            ["name" => "Cost", "type_id" => \App\Model\Input\Type::COST],
            ["name" => "Datenschutzerklärung", "type_id" => \App\Model\Input\Type::CHECKBOX],
            ["name" => "Bewertung", "type_id" => \App\Model\Input\Type::RATING],
            ["name" => "Wohnort", "type_id" => \App\Model\Input\Type::AUTOCOMPLETE],
        ];
        foreach ($fields as $field) {
            \App\Model\Field\Field::query()->create($field);
        }

    }
}
