@extends('layouts.main')

@section('content')

<div id="allBooksMainContainer">
  <div id="sideFilterContainer">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>

  <div id="blankPaddingAllBooks"></div>
  <div id="booksContainer" class="container">


    <!-- Card deck -->
    <div id="booksCardDeck" class="card-deck">

      @foreach($books as $key => $value)
      <!-- Card -->
      <div class="card mb-4">

        <!--Card image-->
        <div class="view overlay">
          <span id="wishlistHeartContainer">
            <a class="addToWishlistHeartIconLink d-flex justify-content-center">
              <i class="addToWishlistHeartIcon far fa-heart"></i>
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
          <p class="card-text"><small>by</small> {{ $value->author }}</p>

        </div>

        <!-- Card footer -->
        <div class="card-footer d-flex justify-content-center">
          <a type="button" class="btn btn-sm white-text defaultGradientButton">Add to cart</a>
        </div>

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