<?php

namespace App\Http\Controllers;
use App\Models\Author;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function index(){


        $authors = Author::allAuthors();

        return response()->json([
            "success" => true,
            'message' => 'Get all resources',
            'data' => $authors
        ], 200);
    }
}
