<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class list_posts extends Model
{
    use SoftDeletes;
    protected $fillable = ['post_title','day_create', 'post_desc','post_content','post_url_title','post_thumb','post_id','post_cat'];
}
