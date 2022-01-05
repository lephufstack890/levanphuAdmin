<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class product_slides extends Model
{
    protected $fillable = ['product_slide_img','product_slide_id'];
    
    function list_products(){
        return $this->belongsTo('App\list_products');
    }
}
