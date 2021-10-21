<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\AclController;
use Illuminate\Http\Request;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $acl = new AclController();
        $roles = $acl->getUserRoles();

        //dd(count($roles));
        foreach($roles as $data){
            if($data->role->name != 'ADMIN'){
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
