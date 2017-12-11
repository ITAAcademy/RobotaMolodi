<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\SocialAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\SocialAccountService;
use GuzzleHttp\Client as GuzzleHttpClient;

use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
       {
           return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
            ])->scopes([
                'public_profile', 'user_birthday'
            ])->redirect();
    }

    public function redirectToProvider($provider)
        {
             return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(\App\SocialAccountsService $accountService, $provider)
        {
            try {
                $user = \Socialite::with($provider)->user();
            } catch (\Exception $e) {
                return redirect('/login');
        }
            $authUser = $accountService->findOrCreate(
                $user,
                $provider
            );
            auth()->login($authUser, true);
            return redirect()->to('/home');
    }

}
