<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $feedback = Feedback::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Feedback!',
                'data' => $feedback,
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
            $feedback = $request->all();
            $validate = Validator::make($feedback, [
                'comment' => 'required',
                'id_user' => 'required',
            ]);
            if ($validate->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validate->errors(),
                ], 400);
            }

            $request['status'] = "False";

            $feedback = Feedback::create($request->all());
            return response()->json([
                'message' => 'Berhasil Insert Feedback!',
                'data' => $feedback,
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
     * Display the specified resource.
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $feedback = Feedback::find($id);

            if (!$feedback) throw new \Exception('Feedback tidak ditemukan!');

            $feedback->update($request->all());

            return response()->json([
                'message' => 'Berhasil update Feedback!',
                'data' => $feedback,
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
    public function destroy(string $id)
    {
        try {
            $feedback = Feedback::find($id);

            if (!$feedback) throw new \Exception('Feedback tidak ditemukan!');

            $feedback->delete();

            return response()->json([
                'message' => 'Berhasil delete feedback!',
                'data' => $feedback,
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