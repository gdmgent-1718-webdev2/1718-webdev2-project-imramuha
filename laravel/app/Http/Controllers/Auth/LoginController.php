<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    protected function guard()
    {
        // specify the guard that should be used for login attempts
        return Auth::guard('web');
    }
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
    protected $redirectTo = '/backoffice/dashboard';
    


    protected function authenticated($request, $user) {

            if($user->hasRole('admin')) {
                return redirect('/admin');
            } elseif ($user->hasRole('moderator')) {
                return redirect('/moderator');
            } else {
                // Gotta add a view that tell if the user is banned or customer not allowed acces
                return redirect('/no-acces');
            }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
}
