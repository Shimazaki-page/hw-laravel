<?php

namespace App\Http\Middleware;

use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->role == 1 || Auth::user()->role == 5) {
                    return redirect('/');
                } elseif (Auth::user()->role == 10) {
                    return redirect('/mypage/' . $this->searchStudentId(Auth::user()->id));
                }
            }
        }

        return $next($request);
    }

    public function searchStudentId($user_id){
        $student=Student::where('user_id',$user_id)->first();

        return $student->id;
    }
}
