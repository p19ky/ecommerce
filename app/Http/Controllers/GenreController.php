<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Classification::all();  // fetching all the data from the Classification table
        return view('genres', compact('genres'));

    }


    public function displayTable(){
        return view('genreTest');
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
            'genreName' => 'required',
            'genrePicture' => 'required',
            'genreDescription' => 'required'
            
        ]);          

        $genre = new Classification;

        //inseram valorile corespunzatoare in coloane
        $genre->name = $request->genreName;
        $genre->description = $request->genreDescription;
        $genre->picture = $request->genrePicture;

        $genre->save();

        return redirect(route('genres'))->with('successMsg','Genre successfully added to the database'); 
        

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