<?php

namespace App\Http\Controllers;

use App\Models\TransactionCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionCartController extends Controller
{

    public function index()
    {
        try {
            $transaction = TransactionCart::all();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Transaksi Cart!',
                'data' => $transaction,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    // public function index2($id)
    // {
    //     try {
    //         $transaction = 
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Berhasil Ambil Data Transaksi!',
    //             'data' => $transaction,
    //         ], 200);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage(),
    //             'data' => [],
    //         ], 400);
    //     }
    // }


    public function store(Request $request)
    {
        try {
            $transaction = TransactionCart::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Insert Data Transaksi!',
                'data' => $transaction,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'data' => [],
            ], 400);
        }
    }

    public function findLast() 
    {
        try {
            $transaction = TransactionCart::all()->last();
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Ambil Data Transaksi!',
                'data' => $transaction,
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
