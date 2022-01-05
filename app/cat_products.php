<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat_products extends Model
{
    protected $fillable = ['product_cat_title', 'product_url_cat_title','product_cat_id', 'product_cat_thumb'];
}
