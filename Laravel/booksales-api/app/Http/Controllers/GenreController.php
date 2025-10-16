<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    //
    public function index(){


        $genres = Genre::allGenres();

        return response()->json([
            "success" => true,
            'message' => 'Get all resources',
            'data' => $genres
        ], 200);
    }
}
