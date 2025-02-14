<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Books;
use Illuminate\Support\Facades\DB;
use Illuminate\html;
use App\Classification;
use App\Orders;


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
        $genreOption = -1;
        $authorOption = -1;
        $keyword = "";
        $authors = Books::select('author')->distinct('author')->orderBy('author')->get();



        /**
         * ---- filter by author ----
         */

        if(request()->filled('filterAuthor')){
            $authorOption = request('filterAuthor');
            if($authorOption != -1)
            {
                $books=$books->where('author', '=', $authorOption );
                $queries['filterAuthor'] = $authorOption;
            }   
        }


        /**
         * ---- filter by genre ----
         *  */    

         if(request()->filled('filterGenre')){
         $genreOption=request('filterGenre');
        if($genreOption != -1)
        {
            $books=$books->where('classifId', '=', $genreOption );
            $queries['filterGenre'] = $genreOption;
        }
        }

        /** ---- advanced search ----
         * checking if field is empty. if not -> filter
         */

        // daca avem titlu
        if (request()->filled('titleInput')) {
            $title = request('titleInput');
            $books = $books->where('name', 'LIKE', '%' . $title . '%');
            $queries['titleInput'] = request('titleInput');
        }

        // daca avem autor
        if (request()->filled('authorInput')) {
            $author = request('authorInput');
            $books = $books->where('author', 'LIKE', '%' . $author . '%');
            $queries['authorInput'] = request('authorInput');
        }

        // daca avem language
        if (request()->filled('languageInput')) {
            $language = request('languageInput');
            $books = $books->where('language', 'LIKE', '%' . $language . '%');
            $queries['languageInput'] = request('languageInput');
        }

        // .. tags
        if (request()->filled('tagsInput')) {
            $tags = request('tagsInput');
            $books = $books->where('name', 'LIKE', '%' . $tags . '%')->orWhere('description', 'LIKE', '%' . $tags . '%')->orWhere('author', 'LIKE', '%' . $tags . '%');
            $queries['tagsInput'] = request('tagsInput');
        }

        // genres
        if (request()->filled('genreSelect')) {
            $genre = request('genreSelect');
            $books = $books->where('classifId', 'LIKE', '%' . $genre . '%');
            $queries['genreSelect'] = request('genreSelect');
        }


        /** ---- main search ---- */
        if (request()->filled('main_search')) {
            $keyword = request('main_search');
            $books = $books->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('author', 'LIKE', '%' . $keyword . '%');
            $queries['main_search'] = request('main_search');
        }


         /**
          * ---- price filter ----
          */

          $minPriceOption = 0;
          $maxPriceOption = 200;
        if (request()->filled('min_price')) {
            $books = $books->where('price', '>=', request('min_price'));
            $queries['min_price'] = request('min_price');
            $minPriceOption = request('min_price');
        }

        if (request()->filled('max_price')) {
            $books = $books->where('price', '<=', request('max_price'));
            $queries['max_price'] = request('max_price');
            $maxPriceOption = request('max_price');
        }


        /**
         * ---- sort books ----
         */
        // books from A-Z - default Sort
         $sortingOption=request('sortBooks');
         if ($sortingOption == 0){
              $books=$books->orderBy('name');
         }
        // authors from A-Z
         if ($sortingOption == 1){
             $books=$books->orderBy('author');
        }
        // price: low to high
        if ($sortingOption == 2){
         $books=$books->orderBy('price');
       }
        // price: high to low
        if ($sortingOption == 3){
         $books=$books->orderBy('price', 'desc');
       }
 
     $queries['sortBooks']=$sortingOption;

        /**
         * reset
         */
        if(request()->filled('reset')){
            $authorOption=-1;
            $genreOption=-1;
            $maxPriceOption=200;
            $minPriceOption=0;
            $sortingOption=0;
            $queries=[];
        }

        $books = $books->paginate(10)->appends($queries);

        return view('books/allBooks')->with('authorOption', $authorOption)->with('keyword', $keyword)->with('maxPriceOption', $maxPriceOption)->with('minPriceOption', $minPriceOption)->with('genreOption', $genreOption)->with('sortingOption', $sortingOption)->with('authors',$authors)->with('books', $books)->with('queries', $queries)->with('searchMsg', '')->with('classifications', $classifications);

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

        return redirect(route('admin.books'))->with('successMsg', 'Book successfully added to the database');
    }


    public function storeOrder(Request $request){
         //validam datele de intrare
         $this->validate($request, array(
            'firstName' => 'required',
            'lastName' => 'required',
            'street' => 'required',
            'number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'county' => 'required',
        ));

        $order = new Orders;
        $mytime = Carbon::now();
        $mytime=$mytime->toDateTimeString();

        $order->totalPrice = 176.9;
        $order->date=$mytime;
        $order->firstName=$request->firstName;
        $order->lastName=$request->lastName;
        $order->street=$request->street;
        $order->number=$request->number;
        $order->building=$request->building;
        $order->apartment=$request->apartment;
        $order->city=$request->city;
        $order->county=$request->county;
        $order->orderStatus="in process";
        $order->id=3;
        $order->paymentId=1;

        $order->save();

        return redirect(route('allBooks'))->with('orderSuccess', ' Thank you for your order! You will shortly be contacted if necessary. Stay safe!');
    }



    public function indexOrders(){
        $orders=Orders::all();
        return view('admin/orders');
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


        return redirect(route('admin.books'))->with('successMsg', 'Book successfully updated');
    }



    public function delete($id)
    {
        Books::find($id)->delete();
        return redirect(route('admin.books'))->with('successMsg', 'Book successfully deleted');
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
