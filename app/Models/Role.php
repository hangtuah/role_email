<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'abc_role';
    protected $primaryKey = 'id';
    protected $fillable =['name', 'display_name', 'description','created_at', 'updated_at'];

    public function roleUser(){
        return $this->hasMany(RoleUser::class);
    }
}
