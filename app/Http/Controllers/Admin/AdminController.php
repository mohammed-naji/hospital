<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {

        // if(Auth::user()->type == 'patient') {
        //     return redirect('/');
        // }

        // dd(Auth::user());
        return view('admin.index');
    }

    public function change_password($id)
    {
        return view('admin.change_password', compact('id'));
    }

    public function change_password_submit(Request $request, $id)
    {
        // $request->validate([
        //     'token' => 'required',
        //     'password' => 'required|confirmed'
        // ]);

        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::find($id);
        if($user && $user->type == 'doctor') {
            if($request->token == $user->token) {
                $user->update(['password' => bcrypt($request->password)]);
                Auth::login($user);
                return redirect()->route('admin.index');
            }else {
                $validator->errors()->add('token', 'Token is incorrect');
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
                // return redirect()->back()->withErrors('token', 'The token is incorrect');
            }
        }
    }
}
