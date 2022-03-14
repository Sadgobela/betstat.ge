<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        dd($this);
        $this->middleware('guest')->except('logout');
    }

    public function userLogin(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
//        print_r($credentials);
//        dd(Auth::validate($credentials));
        if(!Auth::validate($credentials)):
            return redirect()->back()
                ->withErrors(trans('auth.failed'));
        endif;

//        print_r($credentials);
//        dd(Auth::validate($credentials));
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->back();
        return $this->authenticated($request, $user);
    }
}
