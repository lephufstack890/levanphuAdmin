<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function rolesChildrent(){
        return $this->hasMany(Role::class, 'parent_id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
