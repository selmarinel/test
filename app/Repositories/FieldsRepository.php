<?php

namespace App\Repositories;

use App\Model\Field\Field;

class FieldsRepository
{
    public function getAll()
    {
        return $collection = Field::query()->get()->map(function ($field) {
            /** @var Field $field */
            return array_merge($field->getType()->render(), ['title' => $field->getName()]);
        });
    }
}