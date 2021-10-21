<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class ApiController extends Controller
{
    public function get_all_book(Request $request){
        return response()->json(Buku::all(), 200);
    }
}
