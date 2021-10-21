<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use Auth;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $acl = new AclController();
        $roles = $acl->getUserRoles();
        
        return view('home',compact('roles'));
    }

    public function sendEmailApproval() {

        Mail::to('mohdfairusahmad@gmail.com')->send(new SendEmail());
        return back()->with('success', 'email sent!');
    }
}
