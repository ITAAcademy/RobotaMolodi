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
                'Authorization' => 'Bearer '.'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImY5MDcyOWQwZjlmZmQ1MjE0OGQ4Yjk3MTE1NWM4YjdjNTBiYTEyYTc5NWQzMGY5MDQxNmM5ZWQyMjE2OTkwNTIwZGI5Y2ZmZjk4ODg1Zjc1In0.eyJhdWQiOiIxIiwianRpIjoiZjkwNzI5ZDBmOWZmZDUyMTQ4ZDhiOTcxMTU1YzhiN2M1MGJhMTJhNzk1ZDMwZjkwNDE2YzllZDIyMTY5OTA1MjBkYjljZmZmOTg4ODVmNzUiLCJpYXQiOjE1MDM2ODgwNTUsIm5iZiI6MTUwMzY4ODA1NSwiZXhwIjoxNTM1MjI0MDU1LCJzdWIiOiIzOCIsInNjb3BlcyI6WyJ1c2VyQmFzZUluZm8iXX0.CTSlTERg78XrDpTn_R5GRY6G0r9BoEZ0_k4teRuFhzrmytbZnsnLBx0LB57ieDdHWJ99K4lMtD7SX6oWoxhyEHTBqjrKaPNerBKju0OWNUcP3MA6fHA01w0m5kJcU3OeafbZYEu5zsV4G-Hsh4yBD_Fg4pcXaIQz1aEV5BxDsxvoQ0_8pvEA65ipaX7aYcO5M6vWazp6-bgwy-ruby2xrv2jxkeJs9LDJkId-Ama8GBDzPLQgjgi9q_F-w5RWJ3jljV6xoqWUtR9_mnbNdXWt3N-qyIQpMLN_ZgBTURpvoXi3UQKRpFnVUwbSceCJ23xq4VA2Gju_q1CXTIa4FJLBLaKVrTCO-XqSs81MRAUYqj7xI5psAjKgbgh2FEhlaGTZyUC6XO5VYWSRyj1QYpWP3X4ReF8YkNf-Q27kACbGNiaBSZceU0HeD1_jOT3JCB27FfxhxXf8yPMODd_OMNg8mK22g6Rl9v6mZ1wWKHYCrdlGs4HlC7eAWwJWPJgbClFURYNVdWfzQ4QVp02LqKURWI0KGTW-lmG5fy64ETyWSVBPPXHXG8j0IaC48LitLo2U6Ql6AY5wegjCIeVucSOJUvDzT5g39m-v8_45XCW-sIZjfAmpKWJNr5OCQO7h6SjCcXKM65kBDU3CC3Xu-JXIDJPOHUZ96iLUaLCtLNRzsw'],
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
