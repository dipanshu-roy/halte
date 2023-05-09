<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Socialite;
use Auth;

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


    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect('/account/login')->with('error', 'Login Failed');
        }
        $existingUser = User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $newUser                    = new User();
            $newUser->provider_name     = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->profile           = $user->getAvatar();
            $newUser->save();
            Auth::login($newUser, true);
        }
        return redirect()->back()->with('success', 'Login Successfull');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}