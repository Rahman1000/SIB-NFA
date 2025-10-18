<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    //
    public function index(){
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Reources data not found',
                'data' => []
            ], 200);
        }

        return response()->json([
            "success" => true,
            'message' => 'Get all resources',
            'data' => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validasi Data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'required|text',
        ]);

        // 2. check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }


        // 3. upload image
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // 4. insert data
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);


        // 5. response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully',
            'data' => $author
        ], 201);
    }

    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get resource detail',
            'data' => $author
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. Mencari Data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'required|text',
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
            'bio' => $request->bio,
        ];

        // 4. handle image (upload & delete image)
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $image->hashName();
        }

        // 5. update data baru ke database
        $author->update($data);

        // 6. response
        return response()->json([
            'success' => true,
            'message' => 'Resources updated successfully',
            'data' => $author
        ], 200);
    }

    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        if ($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully',
        ], 200);
    }
}
