<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // request()->appkey
        if(request()->has('appkey')) {

            if(request()->appkey == 123) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Success',
                    'data' => Department::all()
                ], 200);
            }else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Wrong appkey',
                    'data' => ''
                ], 404);
            }


        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Please provide appkey',
                'data' => ''
            ], 404);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Department::create($request->all());
        return response()->json([
            'status' => 201,
            'message' => 'Success',
            'data' => Department::create($request->all())
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Department::find($id);
        if($item) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => Department::find($id)
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Error',
                'data' => []
            ], 404);
        }

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
        // return $request->all();
        return response()->json([
            'status' => 200,
            'message' => 'Success',
            'data' => Department::find($id)->update($request->all())
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Department::find($id);
        if($item) {
            $item->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Department Deleted',
                'data' => []
            ], 200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => 'Error',
                'data' => []
            ], 404);
        }
    }
}
