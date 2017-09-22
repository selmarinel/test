<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FieldType
 * @property $rules
 * @property FieldTypes $type
 * @property string $name
 * @package App\Model
 */
class Fields extends Model
{
    protected $table = 'feedback_fields';

    protected $fillable = [
        "name",
        "type_id",
        "rules"
    ];

    public function getRulesAttribute()
    {
        return json_decode($this->attributes['rules']);
    }

    public function type()
    {
        return $this->hasOne(FieldTypes::class);
    }


}
