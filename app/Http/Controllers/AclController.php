<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use Auth;

class AclController extends Controller
{
    public function getUserRoles(){

        $roles = RoleUser::with(['role'])->where('user_id', Auth::id())->get();
        return $roles;
    }
}
