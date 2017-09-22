<?php

namespace App\Service;


class FieldTypeGenerator
{
    public static function radioType()
    {
        return "radio";
    }

    public static function generateFieldVariant($name, $value)
    {
        return [
            "name" => $name,
            "value" => $value
        ];
    }

    public static function generatePrefixVariant($value)
    {
        return [
            "prefix" => true,
            "value" => $value
        ];
    }

    public static function generatePostFixVariant($value)
    {
        return [
            "postfix" => true,
            "value" => $value
        ];
    }

    public static function generateRating($max)
    {
        $result = [];
        for ($i = 1; $i <= $max; $i++) {
            $result[] = ["value" => $i];
        }
        return $result;
    }

    public function generateEntityRelate($entityClass)
    {
        return ["entity" => $entityClass];
    }
}