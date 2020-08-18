@extends('layouts.main')

@section('content')


<div id="allBooksMainContainer">


  <div id="sideFilterContainer">

    <div class="container">

      <form action="{{ route('allBooks') }}" method="get">

        {{ csrf_field() }}

        <div class="d-flex justify-content-center">
          <input type="submit" value="Filter" class="btn white-text defaultGradientButton btn-lg">
        </div>
        <!-- min price -->
        <div class="md-form">
          <input id="minPriceFilterInput" type="text" class="form-control"> 
          <label class="minPriceInputLabel" for="minPriceFilterInput">Min. Price</label>
        </div>
        <div class="d-flex justify-content-center my-4">
          <div class="w-75">
            <input name="min_price" type="range" class="custom-range" id="customRangeMin" value="{{ $minPriceOption}}" step="0.10" min="0.00" max="200.00">
          </div>
          <span style="width:55px;" class="font-weight-bold text-primary ml-2 valueSpanMin"></span>
        </div>

        <!-- max price -->
        <div class="md-form">
          <input id="maxPriceFilterInput" type="text" class="form-control">
          <label class="maxPriceInputLabel" for="maxPriceFilterInput">Max. Price</label>
        </div>
        <div class="d-flex justify-content-center my-4">
          <div class="w-75">
            <input name="max_price" type="range" class="custom-range" id="customRangeMax" value="{{ $maxPriceOption}}" step="0.10" min="0.00" max="200.00">
          </div>
          <span style="width:55px;" class="font-weight-bold text-primary ml-2 valueSpanMax"></span>
        </div>



        <!-- look for authors -->
        <br>
        <div class="d-flex md-form">
        <label class="maxPriceInputLabel" for="filterAuthor">Author: </label><br><br>
        <input disabled="disabled" id="filterAuthor" name="filterAuthor" type="text" class="form-control"><br>
        <select style="float:left; color:rgb(128,128,128);" class="form-control" name="filterAuthor" id="filterAuthor" value="Filter Author">
        <option selected="selected" id="-1" name="-1" value="-1">All Authors</option>
        @foreach($authors as $author)
        <option {{ $authorOption == $author['author'] ? "selected" : "" }} style="color:rgb(128,128,128);" name="{{$author['author']}}" value="{{$author['author']}}" id="{{$author['author']}}">{{$author['author']}}</option>
        @endforeach
        </select>
      </div>



        <br>
        <!-- filter by genre -->

      <div class="d-flex md-form">
        <label class="maxPriceInputLabel" for="filterGenre">Genre: </label><br><br>
        <input disabled="disabled" id="filterGenre" name="filterGenre" type="text" class="form-control"><br>
        <select style="float:left; color:rgb(128,128,128);" class="form-control" name="filterGenre" id="filterGenre" value="Filter Genre">
        <option selected="selected" id="-1" name="-1" value="-1">All Genres</option>
        @foreach($classifications as $genre)
        <option {{ $genreOption == $genre->id ? "selected" : "" }} style="color:rgb(128,128,128);" name="{{$genre->id}}" value="{{$genre->id}}" id="{{$genre->id}}">{{$genre->name}}</option>
        @endforeach
        </select>
      </div>


      <br>
    

    </div>

  </div>


  <div id="blankPaddingAllBooks"></div>

  <div id="booksContainer" class="container">

<!-- sort books --> 
    <div class="d-flex" style="float:right; position:relative;">
        <select class="btn white-text defaultGradientButton" name="sortBooks" id="sortBooks" value="sortBooks" onchange="this.form.submit();">
        <option {{ 0 == $sortingOption ? "selected" : "" }} style="color:black;" name="0" id="0" value="0">Books from A-Z </option>
        <option {{ 1 == $sortingOption ? "selected" : "" }} style="color:black;" name="1" id="1" value="1">Authors from A-Z </option> 
        <option {{ 2 == $sortingOption ? "selected" : "" }} style="color:black;" name="2" id="2" value="2">Price: Low to High </option> 
        <option {{ 3 == $sortingOption ? "selected" : "" }} style="color:black;" name="3" id="3" value="3">Price: High to Low </option> 
        </select>
    </div>
</form>

<!-- reset button -->
<div class="d-flex justify-content-start">
  <form action="{{ route('allBooks') }}" method="get">
        {{ csrf_field() }}
       <div style="float:left;" class="d-flex justify-content-center">
          <input name="reset" id="reset" type="submit" value="Reset Filters" class="btn text-white reversedGradientButton">
        </div>
        <br><br><br>
    </form>

      
      <!-- advanced search href -->
    <input data-toggle="modal" data-target="#advancedSearchModal" value="Advanced Search" class="btn text-white reversedGradientButton"></input>

</div>
  @if($books->isEmpty())
  <div class="alert alert-info" role="alert">
  No results. Please try searching again. </div>
  @else
    @if($keyword!= "")
    <div class="alert alert-info" role="alert">
    {{count($books)}}  result(s) found. </div>
    @endif
  @endif

    @if (session('noResults'))
    <div class="alert alert-info" role="alert">
      {{ session('noResults') }}
    </div>
    @endif
    @if(!empty($searchMsg))
    <div class="alert alert-info" role="alert">
      {{ $searchMsg }}
      <table>
        <tr>
          @foreach ($queries as $query)
          <td>{{$query}}</td>
          @endforeach
        </tr>
        <table>
    </div>
    @endif
    <!-- Card deck -->
    <div id="booksCardDeck" class="card-deck">
    
      @foreach($books as $key => $value)
      <!-- Card -->
      <div class="card mb-4">

        <!--Card image-->
        <div class="view overlay">
          <span class="wishlistHeartContainer">
            <a class="addToWishlistHeartIconLink d-flex justify-content-center">
              <i class="addToWishlistHeartIcon far fa-heart"></i>
              <div class="bookIdDiv" style="display:none;">{{ $value->id }}</div>
            </a>
            <span class="heartClicker d-flex justify-content-center"></span>
          </span>
          <img class="card-img-top" src="{{ $value->picture }}" alt="Card image cap" height="200px">
          <a href="{{  route('product', $value->id) }}">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <!--Card content-->
        <div class="card-body">
        

          <!--Title-->
          <h4 class="card-title">{{ $value->name }}</h4>
          <!--Text-->
          <p class="card-text c-a"><small>by</small> {{ $value->author }}</p>
          <p class="card-text classif">{{ $classifications->where('id', '=', $value->classifId)->first()->name }}</p>
          <p class="card-text c-p">${{ $value->price }}</p>
          <div class="bookIdDiv" style="display:none;">{{ $value->id }}</div>

        </div>

        <!-- Card footer -->
        @auth
        <div class="card-footer d-flex justify-content-center">
          <a type="button" class="btn btn-sm white-text defaultGradientButton addToCartMainClass">Add to cart</a>
        </div>
        @endauth
        @guest
        <div class="card-footer d-flex justify-content-center">
          <a onclick="showShoppingCart()" type="button" class="btn btn-sm white-text defaultGradientButton">Add to cart</a>
        </div>
        @endguest

      </div>
      <!-- Card -->
      @endforeach
    </div>
    <!-- Card deck -->

    <div id="allBooksPaginatorDiv" class="d-flex justify-content-center">
      {{$books->links()}}
    </div>

  </div>

</div>

@endsection