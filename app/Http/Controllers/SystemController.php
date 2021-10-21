<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('system', compact($this->getRole()));
    }

    public function getRole(){
        $acl = new AclController();
        $roles = $acl->getUserRoles();

        return $roles;
    }
}
