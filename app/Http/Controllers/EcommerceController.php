<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Classification;

class EcommerceController extends Controller
{
    public function index()
    {
        $books = Books::All();
        $classifications = Classification::All();
        $randomBooks =
            Books::orderByRaw('RAND()')->take(10)->get();

        return view('welcome', compact('books', 'classifications', 'randomBooks'));
    }
}
