<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldForm extends Model
{
    protected $fillable = [
        'place_holder',
        'options',
        'min_value',
        'max_value',
        'form_id',
        'field_id',
        'label_name',
        'is_required',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
