<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class merchantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //role = (Admin, coustmer, driver, merchant)
        if (Auth::check()){
            if(Auth::user()->role == 'merchant'){

                return $next($request);


            }else{

                return redirect('/listings')->with('massage','Access denied because you are not the admin');

            }


    }else{


        return redirect('/login')->with('massage','please login so you can continue');



    }
  }
}
