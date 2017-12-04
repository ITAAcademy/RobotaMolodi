<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use GuzzleHttp\Client as GuzzleHttpClient;
use Socialite;

define("SERVICE", "it");

class oAuthApiController extends Controller{

    public function tokenHandler($userUID, $accessToken, $refreshToken){
        $http = new GuzzleHttpClient;
        $response = $http->request('GET', env("SSO_HOST").'/api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);
        $userData = json_decode((string) $response->getBody());
        $name = empty($userData->firstName) ? 'IntitaUser' : $userData->firstName;

        $user = User::where('uuid', $userUID)->where('service', SERVICE)->first();

        if($user){
            $user->access_token = $accessToken;
            $user->refresh_token = $refreshToken;
        }else{
            $user = new User([
                'name' => $name,
                'email' => $userData->email,
                'service' => SERVICE,
                'access_token' => $accessToken,
                'refresh_token' => $refreshToken,
                'uuid' => $userUID,
            ]);
        }
        $user->save();

        Auth::login($user, true);
        return redirect('cabinet');
    }

    public function intitaAuth(Request $request){
        $http = new GuzzleHttpClient;
        $response = $http->post(env("SSO_HOST").'/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env("SSO_CLIENT_ID"),
                'client_secret' => env("SSO_CLIENT_SECRET"),
                'redirect_uri' => env("SSO_REDIRECT_URI"),
                'code' => $request->code,
            ],
        ]);
        $userData = json_decode((string) $response->getBody());
        $userUID = $userData->userUID;
        $accessToken = $userData->access_token;
        $refreshToken = $userData->refresh_token;

        return $this->tokenHandler($userUID, $accessToken, $refreshToken);
    }

    public function intitaLogin(Request $request){
        $query = http_build_query([
            'client_id' => env("SSO_CLIENT_ID"),
            'redirect_uri' => env("SSO_REDIRECT_URI"),
            'response_type' => 'code',
            'scope' => 'userBaseInfo',
        ]);
        return redirect(env("SSO_HOST").'/oauth/authorize?'.$query);
    }


    public function refreshAuthToken($refreshToken){
        $http = new GuzzleHttpClient;
        $response = $http->post(env("SSO_HOST").'/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $refreshToken,
                'client_id' => env("SSO_CLIENT_ID"),
                'client_secret' => env("SSO_CLIENT_SECRET"),
                'scope' => 'userBaseInfo',
            ],
        ]);
        return json_decode((string)$response->getBody(), true);
    }

        public function redirectToProvider()
            {
                // return Socialize::with('facebook')->redirect();
                // return Socialize::with('facebook')->scopes(['email'])->redirect();
                return Socialite::driver('facebook')->scopes(['email'])->redirect();
            }

        public function handleProviderCallback()
            {
                // $user = Socialize::with('facebook')->user();
                $user = Socialite::driver('facebook')->user();
            // $user->token;
        }


}
