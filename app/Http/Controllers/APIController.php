<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {

        // return bcrypt(123);
        if (Auth::attempt($request->all())) {
            $token = Auth::user()->createToken('dev-token')->plainTextToken;
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'token' => $token
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Errorrrrrrr'
            ], 404);
        }
    }

}
