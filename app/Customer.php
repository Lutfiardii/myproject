<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'customer_name', 'email', 'password', 'no_telp', 'alamat', 'customer_img',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'customer_id');
    }

}
