<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

//    protected function redirectTo(){
//        if(Auth::role()==1){
//            return '/';
//        }
//        return '/';
//    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if($user->role ==1 || $user->role==5){
            $this->redirectTo ='/';
        }elseif($user->role==10){
            $this->redirectTo='/mypage/'.$user->student->id;
        }
    }

    /**
     * ログアウトしたときの画面遷移先
     */
    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}

