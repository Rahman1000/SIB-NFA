<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    //
    public function index(){
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Reources data not found',
                'data' => []
            ], 200);
        }

        return response()->json([
            "success" => true,
            'message' => 'Get all resources',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);


        // 4. response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $genre
        ], 201);
    }

    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource',
            'data' => $genre
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. Mencari Data
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. siapkan data yang ingin diupdate
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // 4. update data baru ke database
        $genre->update($data);

        // 5. response
        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $genre
        ], 200);
    }

    public function delete(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully',
        ], 200);
    }
}
