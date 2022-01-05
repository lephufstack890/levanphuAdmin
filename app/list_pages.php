<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class list_pages extends Model
{
    use SoftDeletes;
    protected $fillable = ['page_title','page_cat','page_content','page_thumb','page_cat_id','page_slug'];
}
