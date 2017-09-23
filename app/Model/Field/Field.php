<?php

namespace App\Model\Field;


use App\Model\Input\GenderType;
use App\Model\Input\InputType;
use App\Model\Input\SelectType;
use App\Model\Input\Type;
use App\Model\Produkts;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Field
 * @property Type $type
 * @package App\Model\Field
 */
class Field extends Model
{
    protected $table = 'fields';

    protected $fillable = [
        "name",
        "type_id"
    ];

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function type()
    {
        return $this->hasOne(Type::class, "id", "type_id");
    }

    public function getType()
    {
        /** @var Type $type */
        $type = $this->type;
        if ($type->getId() == Type::GENDER) {
            return new GenderType($type->getAttributes());
        }
        if ($type->getId() == Type::ALTER) {
            /** @var InputType $input */
            $input = new InputType($type->getAttributes());
            $input->setAdditional(["data-type" => 'alter']);
            return $input;
        }
        if ($type->getId() == Type::PRODUCT) {
            $select = new SelectType($type->getAttributes());
            $select->setEntity(Produkts::class);
            return $select;
        }
        return $type;
    }
}