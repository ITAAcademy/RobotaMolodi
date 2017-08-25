<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleHttpClient;

class oAuthApiController extends Controller{

    public function tokenHandler(Request $request){
        $http = new GuzzleHttpClient;
        $response = $http->request('GET', env("SSO_HOST").'/api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.'code'],
        ]);
        dd(json_decode((string) $response->getBody(), true));
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
        return json_decode((string) $response->getBody(), true);
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

}
