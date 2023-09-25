<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ทำเอง
        // if(Auth::user()->user_type == 'admin'){
        //     return $next($request);
        // }
        // else{
        //     return redirect('/dashboard');
        // }

         // ตรวจสอบว่าผู้ใช้เข้าสู่ระบบแล้ว
         if (Auth::check()) {
            // ตรวจสอบ user_type ว่าเป็น 'admin' หรือไม่
            if (Auth::user()->user_type == 'admin') {
                // ถ้าเป็น 'admin' ให้ไปยังเส้นทาง '/admin'
                return $next($request);
                
            }else{
                //return redirect('/dashboard');
                return redirect('/dashboard');
            }
            
            
        }
    
    


        

    }
}
