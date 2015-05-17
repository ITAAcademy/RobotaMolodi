<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VacancyController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id)
    {
        return view('vacancy.view', ['id' => $id]);
    }

}