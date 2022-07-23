<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['logo', 'phone', 'email', 'address', 'facebook_link', 'twitter_link', 'pintorest_link', 'messenger_link', 'about', 'terms_condition', 'privacy_policy', 'refund_policy', 'google_map_link', 'whatsapp', 'whatsapp_link'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\SubCategory', 'subcategory_id');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
