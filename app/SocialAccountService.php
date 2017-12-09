<?php

namespace App;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Http\Controllers\oAuthController;
use GuzzleHttp\Client as GuzzleHttpClient;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\SocialAccount;
use Laravel\Socialite\SocialiteServiceProvider;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {

        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => 'rstuvwxyzABCDEFGH',
                ]);
            }
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

}
