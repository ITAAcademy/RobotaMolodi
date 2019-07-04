<?php

namespace App\Http\Controllers;

use App\Models\ClientId;
use Illuminate\Http\Request;

use App\Http\Services\ParseJson;
use Illuminate\Support\Str;


ini_set("max_execution_time", 0);
ini_set('memory_limit', '-1');
class AuthCidController extends Controller
{
    public function ClientIdGenerate()
    {
        $client_id = Str::random(5);

        $storeClientId = new ClientId([
            'client_id' => $client_id
        ]);

        $storeClientId->save();

        return $client_id;
    }


    public function ClientId()
    {
        $token = new ClientId();
        $token = $token->getClientId();

        $token = json_decode($token);

        return $token;
    }


    public function CheckClientId(Request $request)
    {
        foreach ($this->ClientId() as $value) {
            if ($value->client_id === $request->client_id)
            {
                $request_token = Str::random(64);

                ClientId::where('client_id', $value->client_id)
                    ->update(['request_token' => $request_token]);

                $res = array('client_id' => $value->client_id,
                    'token' => $request_token);

                return $res;
            }
        }
    }


    public function CheckRequestToken(Request $request)
    {
        foreach ($this->ClientId() as $value)
        {
            if ($value->client_id === $request->client_id)
            {
                if ($value->request_token === $request->request_token)
                {
                    $access_token = Str::random(64);

                    ClientId::where('client_id', $value->client_id)
                        ->update(['access_token' => $access_token]);

                    $res = array('client_id' => $value->client_id,
                        'request_token' => $value->request_token,
                        'access_token' => $access_token);

                    return $res;
                }
            }
        }
    }


    public function CheckAccessToken(Request $request)
    {
        $file = $request->file; //file('D:\xampp\htdocs\file.txt');
        $file = json_decode($file[0]);
        $file = json_decode($file->data);
        $time = date("Y-m-d H:i:s");

        foreach ($this->Clientid() as $value)
        {
            if(strtotime($time) <= strtotime($value->created_at) + 3600)
            {
                if ($request->client_id === $value->client_id)
                {
                    if ($request->request_token === $value->request_token)
                    {
                        if ($request->access_token === $value->access_token)
                        {
                            $testParse = new ParseJson();
                            $testParse->call($file);
                        }
                    }
                }
            } else {
                ClientId::where('client_id', $request->client_id)->delete();
            }
        }
    }
}