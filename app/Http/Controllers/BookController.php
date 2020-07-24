<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;

class BookController extends Controller
{
    public function index(){
        return view('booktest');
    }


    public function store(Request $request){
       //validam datele de intrare
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'details' => 'required',
            'picture' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'classifId' => 'required'

        ]);          

        $book = new Book;

        //inseram valorile corespunzatoare in coloane
        $book->name = $request->title;
        $book->author = $request->author;
        $book->description= $request->description;
        $book->details= $request->details;
        $book->picture= $request->picture;
        $book->price= $request->price;
        $book->quantity= $request->quantity;
        $book->classifId= $request->genre;

        $book->save();

        return redirect(route('home'))->with('successMsg','Book successfully added to the database');
        


    }
}
