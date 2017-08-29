<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use GuzzleHttp\Client as GuzzleHttpClient;

class oAuthApiController extends Controller{

    public function tokenHandler($accessToken, $refreshToken){
        $http = new GuzzleHttpClient;
        $response = $http->request('GET', env("SSO_HOST").'/api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        $name = empty(json_decode((string)$response->getBody())->firstName) ? (
                empty(json_decode((string)$response->getBody())->middleName) ? 'AnonymousIntita' :
                    json_decode((string)$response->getBody())->middleName) :
                    json_decode((string)$response->getBody())->firstName;

        $user = User::where('email', json_decode((string)$response->getBody())->email)
        ->where('service', 'intita')->first();

        if($user){
            $user->accessToken = $accessToken;
            $user->refreshToken = $refreshToken;
        }else{
            $user = new User([
                'name' => $name,
                'email' => json_decode((string)$response->getBody())->email,
                'service' => 'intita',
                'accessToken' => $accessToken,
                'refreshToken' => $refreshToken,
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
        $accessToken = json_decode((string) $response->getBody())->access_token;
        $refreshToken = json_decode((string) $response->getBody())->refresh_token;

        return $this->tokenHandler($accessToken, $refreshToken);
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

}
