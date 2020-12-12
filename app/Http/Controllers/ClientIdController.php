<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutParser;

use App\Http\Services\ParseJson;
use Illuminate\Support\Str;



ini_set("max_execution_time", 0);
ini_set('memory_limit', '-1');
class ClientIdController extends Controller
{
    public function CheckClientId(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|exists:about_parsers,client_id',
            'client_secret' => 'required|exists:about_parsers,client_secret'
        ]);

        $request_token = Str::random(64);

        $parser = AboutParser::where('client_id', $request->client_id)->first();
        $parser->tokens()->where('parser_id', $parser->id)->update(['request_token' => $request_token]);

        $res = array(
            'client_id' => $request->client_id,
            'request_token' => $request_token,
            'client_secret' => $parser->where('client_id', $request->client_id)->first()->client_secret,
        );

        return $res;
    }


    public function CheckRequestToken(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|exists:about_parsers,client_id',
            'request_token' => 'required|exists:parser_tokens,request_token',
            'client_secret' => 'required|exists:about_parsers,client_secret'
        ]);

        $access_token = Str::random(64);


        $parser = AboutParser::where('client_id', $request->client_id)->first();
        $parser->tokens()->where('parser_id', $parser->id)->update(['access_token' => $access_token]);


        $res = array('access_token' => $access_token);

        return $res;
    }


    public function CheckAccessToken(Request $request)
    {
        $this->validate($request, [
            'access_token' => 'required|exists:parser_tokens,access_token'
        ]);

        $file = $request->file; //file('D:\xampp\htdocs\file.txt');
        $file = json_decode($file[0]);
        $file = json_decode($file->data);
        $time = date("Y-m-d H:i:s");

        if (strtotime($time) <= strtotime($request->created_at) + 3600)
        {
            $testParse = new ParseJson();
            $testParse->call($file);
        }
        else
            {
                $parser = AboutParser::where('client_id', $request->client_id)->first();
                $parser->tokens()->where('parser_id', $parser->id)->delete();
            }
    }
}