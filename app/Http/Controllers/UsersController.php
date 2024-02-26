<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//Models
use App\Models\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $user = User::create(array_merge(
            $validator->validate(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully!',
            'user' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(isset($user)){
            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|string|email|max:100',
            'password' => 'string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $user = User::find($id);

        if(isset($user)){
            $user->name = $request->name;
            $user->email = $request->email;

            if(isset($request->password))
                $user->password = bcrypt($request->password);

            if($user->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'User updated successfully!',
                    'user' => $user
                ], 201);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not updated!'
                ], 401);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'User not found!'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!',
            ], 404);
        }

        if ($user->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully!',
                'user' => $user
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'User not deleted!',
        ], 500);
    }
}
