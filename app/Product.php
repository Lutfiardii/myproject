<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class );
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class );
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'product_attributes');
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attributes');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }

}
