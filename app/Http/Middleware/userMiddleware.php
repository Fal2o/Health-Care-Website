<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // ตรวจสอบ user_type ว่าเป็น 'admin' หรือไม่
            if (Auth::user()->user_type == 'user' or Auth::user()->user_type == '0') {
                // ถ้าเป็น 'admin' ให้ไปยังเส้นทาง '/admin'
                return $next($request);
                
            }else{
                //return redirect('/dashboard');
                return redirect('/dashboard');
            }
            
            
        }
    }
}
