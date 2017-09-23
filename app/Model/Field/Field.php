<?php

namespace App\Model\Field;


use App\Model\Input\GenderType;
use App\Model\Input\InputInterface;
use App\Model\Input\InputType;
use App\Model\Input\RatingType;
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

    /**
     * TODO: change this
     * I don't like this. Very closurest
     * @return InputInterface
     */
    public function getType()
    {
        /** @var Type $type */
        $type = $this->type;
        $rules = ["required" => 'true'];

        if ($type->getId() == Type::GENDER) {
            $input = new GenderType($type->getAttributes());
            $input->setAdditional($rules);
            return $input;
        } elseif ($type->getId() == Type::PRODUCT) {
            $input = new SelectType($type->getAttributes());
            $input->setAdditional($rules);
            $input->setEntity(Produkts::class);
            return $input;
        } elseif ($type->getId() == Type::CHECKBOX) {
            $input = new InputType($type->getAttributes());
            $input->setType("checkbox");
            $input->setAdditional($rules);
            return $input;
        } elseif ($type->getId() == Type::RATING) {
            $input = new RatingType($type->getAttributes());
            $input->setAdditional($rules);
            return $input;
        }

        $input = new InputType($type->getAttributes());
        $rules["data-type"] = $type->getName();

        if ($type->getId() == Type::AUTOCOMPLETE) {
            $rules = array_merge($rules, ["minlength" => 3, "maxlength" => 150]);
        }
        if ($type->getId() == Type::ALTER) {
            $rules = array_merge($rules, ["pattern" => "19[0-9]{2}", "maxlength" => 4, "max" => 1999, "min" => 1950]);
        }

        $input->setAdditional($rules);
        return $input;
    }
}