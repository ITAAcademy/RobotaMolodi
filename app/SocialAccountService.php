<?php

namespace App;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;
use GuzzleHttp\Client as GuzzleHttpClient;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\SocialiteServiceProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::where('provider_name', $provider)
                   ->where('provider_id', $providerUser->getId())
                   ->first();

        if ($account) {
            return $account->user;
        } else {

        $user = User::where('email', $providerUser->getEmail())->first();

        if (! $user) {
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name'  => $providerUser->getName(),
                'password' => 'rstuvwxyzABCDEFGH',
            ]);
        }

        $user->accounts()->create([
            'provider_id'   => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;

        }
    }
}
