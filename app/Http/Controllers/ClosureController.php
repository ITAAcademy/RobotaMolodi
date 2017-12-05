<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClosureController extends Controller
{
    /**
     * Display a notification of unavailable service.
     *
     * @return view error 503
     */
    public function unavailableService()
    {
        return view('errors.503');
    }
}
