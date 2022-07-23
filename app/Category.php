<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'status'];

    /*public function subCategory()
    {
        return $this->hasOne('App\SubCategory');
    }*/
}
