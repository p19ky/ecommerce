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
    <div class="card-deck">

      @foreach($books as $book)
      <!-- Card -->
      <div class="card mb-4">

        <!--Card image-->
        <div class="view overlay">
          <img class="card-img-top" src="{{ $book->picture }}" alt="Card image cap">
          <a href="#!">
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>

        <!--Card content-->
        <div class="card-body">

          <!--Title-->
          <h4 class="card-title">{{ $book->name }}</h4>
          <!--Text-->
          <p class="card-text">{{ $book->author }}</p>
          <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
          <button type="button" class="btn btn-light-blue btn-md">Read more</button>

        </div>

      </div>
      <!-- Card -->


      @endforeach
    </div>
    <!-- Card deck -->

    {{ $paginator->currentPage() }}

    {{ $books->onEachSide(5)->links() }}
  </div>
</div>

@endsection