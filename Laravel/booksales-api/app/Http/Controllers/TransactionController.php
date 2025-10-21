<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Reources data not found',
                'data' => []
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all resources',
            'data' => $transactions
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validator & cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // 2. generate ordernumber -> unique | ORD-
        $uniqueCode = 'ORD-' . strtoupper(uniqid());

        // 3. ambil user yang sedang login & cek login (apakah ada data user?)
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }

        // 4. mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok Barang Tidak Cukup'
            ], 400);
        }

        // 6. hitung total harga = price + quantity
        $totalAmount = $book->price * $request->quantity;

        // 7. kurangi stok buku (update)
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan data transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->$book->id,
            'total_amount' => $totalAmount
        ]);

        response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    public function show(string $id)
    {
        $transaction = Transaction::with('user', 'book')->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource detail',
            'data' => $transaction
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'customer_id' => 'exists:users,id',
            'book_id' => 'exists:books,id',
            'quantity' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $data = [
            'customer_id' => $request->customer_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity
        ];

        $transaction->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $transaction
        ], 200);
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully'
        ], 200);
    }
}
