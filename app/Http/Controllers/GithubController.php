<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        // dd('hi');
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback($provider)
    {
//         try {
// //    dd('i');
//             $user = Socialite::driver('github')->user();
//          dd($user);
//             $finduser = User::where('github_id', $user->id)->first();
            
//             if($finduser){
         
//                 Auth::login($finduser);
        
//                 return redirect()->intended('dashboard');
         
//             }else{
//                 // $newUser = User::updateOrCreate(['email' => $user->email],[
//                 //         'name' => $user->name,
//                 //         'github_id'=> $user->id,
//                 //         'password' => encrypt('123456dummy')
//                 //     ]);

//                     $newUser = User::create([
//                         'email' => $user->email,
//                         'name' => $user->nickname,
//                         'github_id'=> $user->id,
//                         'password' => encrypt('123456dummy')
//                     ]);
        
//                 Auth::login($newUser);
        
//                 return redirect()->intended('dashboard');
//             }
        
//         } catch (Exception $e) {
//             dd(
//                 'error'
//             );
//             dd($e->getMessage());
//         }

        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->back();
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('github_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'first_name'     => $user->nickname,
            'last_name'     => $user->nickname,
            'email'    => $user->email,
            'provider' => $provider,
            'github_id' => $user->id,
            'password' => encrypt('123456dummy'),
        ]);
    }
}
