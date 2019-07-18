<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutParser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ClientIdGenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clientsId = AboutParser::all();
        return view('newDesign.admin.parsers.index', ['clients_id' => $clientsId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clientId = new AboutParser();
        return view('newDesign.admin.parsers.create', ['client_id' => $clientId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $client_id = Str::random(5);
        $client_secret = Str::random(10);

        $storeClientId = new AboutParser([
            'site_name' => $request->site_name,
            'client_id' => $client_id,
        ]);

        $storeClientId->save();
        $storeClientId->where('client_id', $client_id)->update(['client_secret' => $client_secret]);

        $parser = AboutParser::where('client_id', $client_id)->first();
        $parser->tokens()->create(['parser_id' => $parser->id]);

        return redirect()->route('admin.client-id.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client_id = AboutParser::find($id);
        return view('newDesign.admin.parsers.edit', ['client_id' => $client_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        //dd($request->all());
        $industry = AboutParser::find($id);
        $industry->fill($request->all());
        $industry->save();

        return redirect()->route('admin.client-id.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        AboutParser::destroy($id);
        return redirect()->route('admin.client-id.index');
    }
}
