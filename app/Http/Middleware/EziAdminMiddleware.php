<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EziAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check())) {

            if(Auth::user()->user_type == 4) {

                if(Auth::user()->is_deleted == 0) {
                    // redirect('admin');
                    return $next($request);
                    
                } else {

                    $notification = array(
                        'title' => 'Login Denied!',
                        'message' => 'User does not exist. Contact Admin.',
                        'alert-type' => 'danger',
                        'icon' => 'block-helper'
                    );

                    Auth::logout();
                    return redirect('login')->with($notification);
                    // return redirect('login');
                }
                
            } else {
                $notification = array(
                    'title' => 'Login Denied!',
                    'message' => 'Sorry you are not an admin. Contact Admin.',
                    'alert-type' => 'danger',
                    'icon' => 'block-helper'
                );

                Auth::logout();
                return redirect('login')->with($notification);
            }
        

        } else {

            $notification = array(
                'title' => 'Login Denied!',
                'message' => 'Admin does not exist. Contact Admin.',
                'alert-type' => 'danger',
                'icon' => 'block-helper'
            );

            Auth::logout();
            return redirect('login')->with($notification);

        }
    }
}
