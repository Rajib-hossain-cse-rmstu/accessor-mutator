<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function redirectTOProvider(){
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback(){
        $user = Socialite::driver('github')->user();
        $this->_registerOrLoginUser($user);
        Toastr::success('LoggedIn with Github','Success');
        return redirect()->route('homeview');
    }
    public function redirectTOFacebookProvider(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookProviderCallback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        Toastr::success('LoggedIn with Facebook','Success');
        return redirect()->route('homeview');
    }
    public function redirectTOGoogleProvider(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleProviderCallback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        Toastr::success('LoggedIn with Google','Success');
        return redirect()->route('homeview');
    }
    public function _registerOrLoginUser($data){
        //    dd($data->user['location']);
    //    dd($data);
        $user=User::where ('email', '=', $data->email)->first();
        if (!$user){
            $user=new User();
            $name = $data->name;
            $explode = explode(" ",$name);
            $user->first_name=$explode[0];
            $user->last_name=$explode[1];
            $user->username=$data->nickname;
            $user->email=$data->email;
            $user->phone=$data->email;
            $user->age=$data->email;
            $user->birthday='1997-05-05';
            $user->address1=$data->user['location'];
            $user->address2=$data->user['location'];
            $user->address3=$data->user['location'];
            $user->provider_id=$data->id;
            $user->avatar=$data->avatar;
            $user->save ();
        }
        Auth::Login($user);
    }
}