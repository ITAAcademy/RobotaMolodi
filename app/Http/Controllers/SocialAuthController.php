<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\SocialAccountService;

use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
       {
           return Socialite::driver('facebook')->redirect();
       }

       public function callback(SocialAccountService $service)
        {
            // $user = Socialize::with('facebook')->user();
            // $providerUser = \Socialite::driver('facebook')->user();
            $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
                auth()->login($user);
                return redirect()->to('/home');
            // $user->token;
        }

// public function redirectToProvider()
//     {
//         // return Socialize::with('facebook')->redirect();
//     }

// public function handleProviderCallback()
//     {
//         $user = Socialize::with('facebook')->user();
// }


}
