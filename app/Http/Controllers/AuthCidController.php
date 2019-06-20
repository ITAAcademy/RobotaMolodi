<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ParseJson;
use Illuminate\Support\Str;
use DB;


use App\Models\ClientSecret;
use App\Models\AccessToken;


ini_set("max_execution_time", 0);
ini_set('memory_limit', '-1');
class AuthCidController extends Controller
{
    public function checkClientid(Request $request)
    {


        $req_tok = DB::table('auth_parser_tokens')->select('auth_parser')->first();
        $req = $req_tok->auth_parser;


        if($req == $request->get('requestToken', $default = NULL))
        {
            ClientSecret::query()->delete();

            $client_id = Str::random(5);
            $token = Str::random(64);

            $addTok = new ClientSecret([
                'client_id' => $client_id,
                'client_secret' => $token,
            ]);

            $addTok->save();

            $res = array('client_id' => $client_id,
                'token' => $token);


            return $res;
        }

    }



    public function CheckClientSecret(Request $request)
    {

        $req_tok = DB::table('client_secrets')->select('client_id', 'client_secret')->first();
        $token = $req_tok->client_secret;
        $c_id = $req_tok->client_id;

        //витягую з реквеста token і client_id//

        $response = $request->data;

        $response = json_decode($response);


        $client_id = $response->client_id;
        $request_token = $response->token;

        //-------------------------------------//

        if($token === $request_token && $c_id === $client_id)
        {
            AccessToken::query()->delete();

            $token = Str::random(64);

            $addTok = new AccessToken([
                'client_id' => $client_id,
                'access_token' => $token,
            ]);
            $addTok->save();

            $res = array('client_id' => $client_id,
                'token' => $token);

            return $res;
        }
    }


    public function CheckAccessToken(Request $request)
    {

        //file_put_contents('D:\xampp\htdocs\file.txt', $request);


        $req_tok = DB::table('access_tokens')->select('client_id', 'access_token')->first();
        $first_token = DB::table('client_secrets')->select('client_secret')->first();

        $first_token = $first_token->client_secret;
        $token = $req_tok->access_token;
        $client_id = $req_tok->client_id;


        $get = [];

        $file = file('D:\xampp\htdocs\file.txt');
        //$file = $request;
        $file = (array)(json_decode($file[8]));

        

        foreach($file as $key => $val){
            //dump($key.' '.$val);
            switch($key):
                case $key:
                    if($token === $val){
                        $get['accessToken'] = $val;
                        continue;
                    }
                case $key:
                    if($client_id === $val){
                        $get['client_id'] = $val;
                        continue;
                    }
                case $key:
                    if($first_token === $val){
                        $get['requestToken'] = $val;
                        continue;
                    }
                default:
                    break;
            endswitch;
        }

        if($get['requestToken'] == $first_token || $get['client_id'] == $client_id || $get['accessToken'] == $token)
        {
            $arr = json_decode($file['data']);
            $testParse = new ParseJson();
            $testParse->call($arr);
        }





    }
}
