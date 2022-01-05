<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class list_products extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_lastname',
        'product_cat',
        'product_slug',
        'product_code',
        'product_newprice',
        'product_oldprice',
        'product_desc',
        'product_id',
        'product_avatar',
        'material_id',
        'color_id',
        'product_status'
    ];

    function product_slides(){
        return $this->hasOne('App\product_slides');
    }
}
