<?php

namespace App\Http\Middleware;

use Closure;

class CheckDay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $today= date('D');
       if($today ='Fri'){
           return redirect()->to('system-closed');
       }
        return $next($request);
    }
}
