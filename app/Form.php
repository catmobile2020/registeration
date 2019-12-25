<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'description',
        'bg_color',
        'title',
        'date',
        'place',
        'btn_name',
        'btn_color',
    ];
=======
>>>>>>> bbfdd81ba58266b3360205fb9a2292a239f3f7fa

    public function fields()
    {
        return $this->hasMany(FieldForm::class);
    }
<<<<<<< HEAD

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
=======
>>>>>>> bbfdd81ba58266b3360205fb9a2292a239f3f7fa
}
