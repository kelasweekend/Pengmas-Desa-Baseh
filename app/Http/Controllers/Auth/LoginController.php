<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // protected function authenticated()
    // {
    //     // if (auth::user()->status == 0) {
    //     //     # jika tidak aktid maka
    //     //     if (auth::user()->role == "admin") {
    //     //         # jika admin maka
    //     //         return redirect()->route('admin');
    //     //     } elseif (auth::user()->role == "dawis") {
    //     //         # jika dawis maka
    //     //         return redirect()->route('keluarga');
    //     //     } elseif (auth::user()->role == "rw") {
    //     //         # jika rw maka
    //     //         return redirect()->route('admin');
    //     //     } elseif (auth::user()->role == "rt") {
    //     //         # jika admin maka
    //     //         return redirect()->route('rt');
    //     //     } else {
    //     //         # jika tidak ada
    //     //         $this->guard()->logout();
    //     //         return redirect()->route('register');
    //     //     }
    //     // } else {
    //     //     # kurang banyak
    //     //     $this->guard()->logout();
    //     //     return redirect()->route('login');
    //     // }
    // }
}
