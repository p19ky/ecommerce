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
        $booksCopy = new Books;
        $classifications = Classification::All();
        $queries = [];

        /**advanced search
         * checking if field is empty. if not -> filter
         */

            // daca avem titlu
            if(request()->filled('titleInput')){
                $title=request('titleInput');
                $books = $books->where('name', 'LIKE', '%' .$title. '%');
                $queries['titleInput'] = request('titleInput');
                
            }

            // daca avem autor
            if(request()->filled('authorInput')){
                $author=request('authorInput');
                $books = $books->where('author', 'LIKE', '%' .$author. '%');
                $queries['authorInput'] = request('authorInput');
            }
            
            // daca avem language
            if(request()->filled('languageInput')){
                $language = request('languageInput');
                $books = $books->where('language', 'LIKE', '%' .$language. '%');
                $queries['languageInput'] = request('languageInput');
                
            }

            // .. tags
            if(request()->filled('tagsInput')){
                $tags = request('tagsInput');
                $books = $books->where('name', 'LIKE', '%' .$tags. '%')->orWhere('description', 'LIKE', '%' .$tags. '%')->orWhere('author', 'LIKE', '%' .$tags. '%');
                $queries['tagsInput'] = request('tagsInput');
                
            }
           
           // genres
             if(request()->filled('genreSelect')){
                $genre=request('genreSelect');
                $books = $books->where('classifId', 'LIKE', '%' .$genre. '%');
                $queries['genreSelect'] = request('genreSelect');
                
            }
        /** end advanced search */  

        /** main search */
        if (request()->filled('main_search')) {
            $keyword=request('main_search');
            $books = $books->where('name', 'LIKE', '%' .$keyword. '%')->orWhere('author', 'LIKE', '%' .$keyword. '%');
            $queries['main_search'] = request('main_search');
            
        }

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

      //if($booksCopy!=$books){
        return view('books/allBooks')->with('books', $books)->with('queries', $queries)->with('searchMsg', '');
    //  }
    //    else {
    //        $searchMsg='';
    //        return redirect(route('allBooks'))->with('noResults', 'Sorry, no results. Try searching again.');
    //        }
       
    }



    /**Display a listing of the resource - admin!! */

    public function indexAdmin()
    {
    
        $books = Books::with('classification')->get();  // fetching all the data from the Books table
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
        $this->validate($request, array(
            'bookName' => 'required',
            'bookAuthor' => 'required',
           // 'bookDescription' => 'required',
            //'bookLanguage' => 'required',
            'bookGenre' => 'required',
            'bookPicture' => 'required',
            'bookPrice' => 'required',
            'bookQuantity' => 'required'
        ));

        $book = new Books;

        $book->name = $request->bookName;
        $book->author = $request->bookAuthor;
        $book->description = $request->bookDescription;
        $book->language = $request->bookLanguage;
        $book->picture = $request->bookPicture;
        $book->price = $request->bookPrice;
        $book->quantity = $request->bookQuantity;
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
        
       // $books = Books::with('classification')->get();  // fetching all the data from the Books table
       
        $book = Books::find($id);
        $genres = Classification::all();
        return view('books/editBook', compact('book', 'genres'));
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
       //validam datele de intrare
       $this->validate($request, array(
        'bookName' => 'required',
        'bookAuthor' => 'required',
       // 'bookDescription' => 'required',
        //'bookDetails' => 'required',
        'bookGenre' => 'required',
        'bookPicture' => 'required',
        'bookPrice' => 'required',
        'bookQuantity' => 'required'
    ));

        $book = Books::find($id);

        $book->name = $request->bookName;
        $book->author = $request->bookAuthor;
        $book->description = $request->bookDescription;
        $book->language = $request->bookLanguage;
        $book->picture = $request->bookPicture;
        $book->price = $request->bookPrice;
        $book->quantity = $request->bookQuantity;
        $book->classifId = $request->bookGenre;
        $book->save();

 
        return redirect(route('books'))->with('successMsg','Book successfully updated'); 
    }



    public function delete($id)
    {
      Books::find($id)->delete(); 
      return redirect(route('books'))->with('successMsg','Book successfully deleted');   
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
