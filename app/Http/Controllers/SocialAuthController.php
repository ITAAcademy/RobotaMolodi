<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\SocialAccountService;
use GuzzleHttp\Client as GuzzleHttpClient;
use App\Http\Controllers\oAuthController;

use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    public function redirect()
       {
           return Socialite::driver('facebook')->redirect();
       }

       public function callback(SocialAccountService $service)
        {
            $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
                auth()->login($user);
                return redirect()->to('/');

        }

}
