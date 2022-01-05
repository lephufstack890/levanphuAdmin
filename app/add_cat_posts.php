<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_cat_posts extends Model
{
    protected $fillable = ['post_cat_title', 'post_url_title_cat','post_cat_id'];
}
