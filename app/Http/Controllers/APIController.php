<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        return view('api.index');
    }

    public function weather()
    {
        return view('api.weather');
    }

}
