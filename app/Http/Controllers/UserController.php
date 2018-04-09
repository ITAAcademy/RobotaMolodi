<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use View;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\File;
use App\Repositoriy\Crop;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        $user = User::find($id);
        return View::make('user.edit', ['user' => $user])->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:30|regex:/^[Є-Їa-zа-я_\-\'\`]+$/iu',
            'avatar' => 'mimes:jpg,jpeg,png,gif'
        ]);

        $user = User::find($id);
        if($user->id === Auth::user()->id) {

            if(Input::hasFile('avatar'))
            {
                $cropcoord = explode(',', $request->fcoords);
                $file = Input::file('avatar');
                $filename = Auth::user()->id . '_'. time() . '.' . $file->getClientOriginalExtension(); //take file name
                $directory = 'image/user/'. Auth::user()->id . '/avatar/';                              //create url to directory
                Storage::makeDirectory($directory);                                                     //create directory
                Crop::input($cropcoord, $filename, $file, $directory);                                  //cuts and stores the image in the appropriate directory
                $user->avatar = $filename;
            }

            $name = $request->input('name');
            $user->name =$name;
            
            $user->push();
            $user->save();
        }

        return redirect('/');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function deleteAvatar($id) {
        $user = User::find($id);
        $directory = $user->getAvatarPath();
        unlink( $directory );
        $user->avatar = null;
        $user->save();

        return redirect()->route('user.edit', $user->id);
    }
}
