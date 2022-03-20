<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Mail\WelcomeDoctorMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'desc')->paginate(5);
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::select('id', 'name_en')->get();
        return view('admin.doctors.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,svg,gif,jpeg',
            'department_id' => 'required'
        ]);

        // Upload Image
        $imgname = 'doctor_'.time().rand().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/doctors'), $imgname);

        // Add Basic Data to User Table
        $rand = rand(00000, 99999);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'type' => 'doctor',
            'token' => $rand
        ]);

        // Add Info Data to Doctor Table
        Doctor::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'image' => $imgname,
            'bio' => $request->bio
        ]);

        // Send Email To Doctor
        Mail::to($request->email)->send(new WelcomeDoctorMail($user->id, $user->name, $rand));

        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verify_doctor($id)
    {
        $user = User::find($id);
        if($user && $user->type == 'doctor') {
            // Auth::login($user);
            return redirect()->route('change_password', $id);
        }else {
            return redirect('/not-allowed');
        }
    }
}
