<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = User::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data User!',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $registrationData = $request->all();
            $validate = Validator::make($registrationData, [
                'email' => 'unique:users',
                'no_telp' => 'unique:users'
            ]);
            if($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validate->errors(),
                ], 400);
            }
            
            $user = User::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Insert Data User!',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
        if ($user && ($credentials['password'] == $user->password)) {
            // Authentication passed
            return response()->json(['message' => 'Logged in', 'data' => $user,]);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan!');

            return response()->json([
                'status' => true,
                'message' => 'Berhasil ambil data user!',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan!');

            $user->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Berhasil update data user!',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if(!$user) throw new \Exception('User tidak ditemukan!');

            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil delete data user!',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }
}