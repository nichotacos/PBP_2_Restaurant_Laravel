<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    public function index()
    {
        try {
            $transaction = Transaction::all();
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

    // public function index2($id)
    // {
    //     try {
    //         $transaction = DB::table('transactions_cart')
    //             ->join('')
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

    public function update(Request $request, $id)
    {
        try {
            $transaction = Transaction::find($id);
            $data = $request->all();

            $transaction->update($data);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil Update Data Transaksi!',
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

    public function store(Request $request)
    {
        try {
            $transaction = Transaction::create($request->all());
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
            $transaction = Transaction::all()->last();
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

    public function findTransaction($id)
    {
        try {
            $transaction = Transaction::where('userId', $id)->get();
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

}
