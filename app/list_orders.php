<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_orders extends Model
{
    protected $fillable = [
        'fullname',
        'gender',
        'phone',
        'email',
        'address',
        'city',
        'username',
        'password',
        'pay',
        'bill_detail',
        'bill_total',
        'bill_count',
        'status',
        'email'
    ];
}
