@extends('layouts.main')

@section('content')


<div id="allBooksMainContainer">

  <div id="sideFilterContainer">

    <div class="container">

      <form action="{{ route('allBooks') }}" method="get">

        {{ csrf_field() }}

        <div class="d-flex justify-content-center">
          <input type="submit" value="Filter" class="btn white-text defaultGradientButton">
        </div>

        <div class="md-form">
          <input id="minPriceFilterInput" type="text" class="form-control">
          <label class="minPriceInputLabel" for="minPriceFilterInput">Min. Price</label>
        </div>
        <div class="d-flex justify-content-center my-4">
          <div class="w-75">
            <input name="min_price" type="range" class="custom-range" id="customRangeMin" value="100" step="0.10" min="0.00" max="200.00">
          </div>
          <span style="width:55px;" class="font-weight-bold text-primary ml-2 valueSpanMin"></span>
        </div>

        <div class="md-form">
          <input id="maxPriceFilterInput" type="text" class="form-control">
          <label class="maxPriceInputLabel" for="maxPriceFilterInput">Max. Price</label>
        </div>
        <div class="d-flex justify-content-center my-4">
          <div class="w-75">
            <input name="max_price" type="range" class="custom-range" id="customRangeMax" value="100" step="0.10" min="0.00" max="200.00">
          </div>
          <span style="width:55px;" class="font-weight-bold text-primary ml-2 valueSpanMax"></span>
        </div>

      </form>

    </div>

  </div>


  <div id="blankPaddingAllBooks"></div>

  <div id="booksContainer" class="container">

  <form action="{{ route('allBooks') }}" method="get">
    {{ csrf_field() }}
    <div class="d-flex" style="float:right; position:relative;">
    <table>
    <tr><td style="font-size:100%;">Sort Books: </td>
    <td>
        <select class="btn white-text defaultGradientButton" name="sortBooks" id="sortBooks" onchange="this.form.submit();" value="Sort Books">
        <option style="color:black;" name="0" id="0" value="0">Books from A-Z</option></button>
        <option style="color:black;" name="1" id="1" value="1">Authors from A-Z</option> 
        <option style="color:black;" name="2" id="2" value="2">Price: Low to High</option> 
        <option style="color:black;" name="3" id="3" value="3">Price: High to Low</option> 
        </select>
      </td>
      </tr>
      </table>
    </div>
</form>
  <br><br><br>

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
          <a href="#!">
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