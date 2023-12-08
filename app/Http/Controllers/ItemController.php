<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        try {
            $user = Item::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Item!',
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

    public function store(Request $request)
    {
        try {       
            $user = Item::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Insert Data Item!',
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

    public function show($id)
    {
        try {
            $user = Item::find($id);

            if(!$user) throw new \Exception('Item tidak ditemukan!');

            return response()->json([
                'status' => true,
                'message' => 'Berhasil ambil data item!',
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
