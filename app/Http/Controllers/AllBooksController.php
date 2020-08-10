<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\html;
use App\Classification;


class AllBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = new Books;
        $classifications = Classification::All();


        $queries = [];

        // if (request()->filled('main_search')) {
        //     $books = $books->where('name', 'like', '%' . request('mainSearch') . '%');
        //     $queries['main_search'] = request('main_search');
        // }

        if (request()->filled('min_price')) {
            $books = $books->where('price', '>=', request('min_price'));
            $queries['min_price'] = request('min_price');
        }

        if (request()->filled('max_price')) {
            $books = $books->where('price', '<=', request('max_price'));
            $queries['max_price'] = request('max_price');
        }

        // if (request()->has('sort')) {
        //     //sort
        //     $books = $books->orderBy('price', request('sort'));
        //     $queries['sort'] = request('sort');
        // }

        $books = $books->paginate(10)->appends($queries);

        return view('books/allBooks', compact('books'));
    }


    /**Display a listing of the resource - admin!! */

    public function indexAdmin()
    {
        //return view('allBooks');
        $books = Books::all();  // fetching all the data from the Books table
        return view('books/booksAdmin', compact('books'));
    }

     /**
     * function to get all the genres and display their names in the select box
     *  (+ input table)
     */


    public function displayTable()
    {
       // $genres = Classification::all();
       $genres = Classification::orderBy('name')->get();  
       return view('books.addBook', compact('genres'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validam datele de intrare
        $this->validate($request, [
            'bookName' => 'required',
            'bookAuthor' => 'required',
          //  'bookDescription' => 'required',
            //'bookDetails' => 'required',
            'bookPicture' => 'required',
            'bookPrice' => 'required',
            'bookQuantity' => 'required',
            'bookGenre' => 'required'

        ]);


        // cautam genre-ul cu id-ul corespunzator pentru a-i afla id-ul
        $bookGenre = Classification::find($id);


        $book = new Books;

        $book->name = $request->bookName;
        $book->author = $request->bookAuthor;
        $book->description = $request->bookDescription;
        $book->details = $request->bookDetails;
        $book->picture = $request->bookPicture;
        $book->price = $request->bookPrice;
        $book->quantity = $request->bookQuantity;
        print_r($request->bookGenre); 
        $book->classifId = $request->bookGenre;
        $book->save();

        return redirect(route('books'))->with('successMsg', 'Book successfully added to the database');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
