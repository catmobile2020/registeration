<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'description',
        'bg_color',
        'title',
        'date',
        'place',
        'btn_name',
        'btn_color',
    ];

    public function fields()
    {
        return $this->hasMany(FieldForm::class);
    }

    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getLogoAttribute()
    {
        return $this->image()->where('type','=','logo')->first()->full_url ?? asset('assets/admin/images/default-image.jpg');
    }

    public function trash()
    {
        $photo = public_path().$this->image->url;
        if (is_file($photo))
        {
            @unlink($photo);
            $this->image()->delete();
        }
        $this->delete();
    }
}
