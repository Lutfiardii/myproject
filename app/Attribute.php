<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'Category_attributes');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class , 'product_attributes');
    }
}
