<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cart = Cart::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Cart!',
                'data' => $cart,
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
            $cart = Cart::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Insert Data Cart!',
                'data' => $cart,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    public function findAvail($id) {
        try {
            $cart = Cart::all()->where('status', '==', 'On progress')->where('itemId', '==', $id)->last();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Cart!',
                'data' => $cart,
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
    // public function show($id)
    // {
    //     try {
    //         $cart = Cart::find($id);

    //         if (!$cart) throw new \Exception('Cart tidak ditemukan!');

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Berhasil ambil data cart!',
    //             'data' => $cart,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage(),
    //             'data' => [],
    //         ], 400);
    //     }
    // }
    
    public function find($id)
    {
        try {
            $cart = Cart::find($id);

            if (!$cart) throw new \Exception('Cart tidak ditemukan!');

            return response()->json([
                'status' => true,
                'message' => 'Berhasil ambil data cart!',
                'data' => $cart,
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
    // public function update(Request $request, $id)
    // {
    //     try {
    //         $cart = cart::find($id);

    //         if (!$cart) throw new \Exception('Cart tidak ditemukan!');

    //         $cart->update($request->all());

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Berhasil update data Cart!',
    //             'data' => $cart,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage(),
    //             'data' => [],
    //         ], 400);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $cart = Cart::find($id);

            if (!$cart) throw new \Exception('Cart tidak ditemukan!');

            $cart->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil delete data cart!',
                'data' => $cart,
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
