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

    public function redirectToProvider($provider)
        {
             return Socialite::driver($provider)->scopes(['users:email'])->redirect();
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

    public function redirect()
       {
           return Socialite::driver('facebook')->scopes([
            'users:first_name', 'users:last_name', 'users:email', 'users:gender', 'users:birthday'
            ])->redirect();
       }

       public function callback(\App\SocialAccountsService $accountService, $provider)
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
