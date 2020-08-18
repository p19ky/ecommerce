@extends('layouts.main')

@section('content')


<div style="padding-top:50px;" class="container dark-grey-text mt-5">

  <div style="display:none;" class="hiddenDivWithInformations">
    <div class="bookId">{{$book->id}}</div>
    <div class="bookImage">{{$book->picture}}</div>
    <div class="bookTitle">{{$book->name}}</div>
    <div class="bookAuthor">{{$book->author}}</div>
    <div class="bookPrice">{{$book->price}}</div>
    <div class="bookGenre">{{ $genres->where('id', '=', $book->classifId)->first()->name }}</div>
  </div>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="text-center wow animate__backInLeft col-md-6 mb-4">

      <img src="{{$book->picture}}" style="border-radius:10px; min-height:400px;" class="img-fluid z-depth-3" alt="{{$book->name}}">

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="wow animate__backInRight col-md-6 mb-4">

      <!--Content-->
      <div class="p-4">

        <div class="mb-3">
          <a>
            <span class="badge purple mr-1 z-depth-2">{{ $genres->where('id', '=', $book->classifId)->first()->name }}</span>
          </a>
          @if ($book->id % 2 == 0)
          <a>
            <span class="badge blue mr-1 z-depth-2">Trending</span>
          </a>
          @endif
          @if ($book->id % 3 == 0)
          <a>
            <span class="badge red mr-1 z-depth-2">Bestseller</span>
          </a>
          @endif
          @if ($book->id % 5 == 0)
          <a>
            <span class="badge green mr-1 z-depth-2">New</span>
          </a>
          @endif

        </div>

        <p class="lead">
          <div class="d-flex justify-content-between">
            <p class="lead font-weight-bold mr-2">{{$book->name}}</p>
            <p class="lead text-muted mr-2">by {{$book->author}}</p>
            <span class="lead mr-2">${{$book->price}}</span>
          </div>
        </p>


        <p class="lead font-weight-bold">Description</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa sint voluptatibus! Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

        @guest
        <a href="{{ url('/login') }}" class="btn defaultGradientButton text-white guestAddToCart">Add to Cart <i class="fas fa-cart-plus"></i></a>
        @endguest
        @auth
        <a class="btn defaultGradientButton text-white addToCartFromProductPage">Add to Cart <i class="fas fa-cart-plus"></i></a>
        @endauth
        <a class="btn defaultGradientButton text-white">Add to Wishlist <i class="fas fa-heart"></i></a>


      </div>
      <!--Content-->

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

  <hr>

  <!--Grid row-->
  <div class="row d-flex justify-content-center wow animate__backInLeft">

    <!--Grid column-->
    <div class="col-md-4 text-center">

      <h4 class="my-4 h4">Additional information</h4>

      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
        voluptates,
        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

  <div class="text-center wow animate__backInRight">
    <h4 class="my-4 h4">Others also searched for these Books</h4>
    <br>
  </div>

  <!--Grid row-->
  <div class="row wow animate__backInRight">


    <!--Grid column-->
    <div class="text-center col-md-4 mb-4">

      <a class="waves-effect waves-light" href="{{  route('product', $randomBooks[0]->id) }}">
        <img src="{{$randomBooks[0]->picture}}" class="img-fluid z-depth-2 randomProductImage" alt="{{$randomBooks[0]->name}}">
      </a>

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="text-center col-md-4 mb-4">

      <a class="waves-effect waves-light" href="{{  route('product', $randomBooks[1]->id) }}">
        <img src="{{$randomBooks[1]->picture}}" class="img-fluid z-depth-2 randomProductImage" alt="{{$randomBooks[1]->name}}">
      </a>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="text-center col-md-4 mb-4">

      <a class="waves-effect waves-light" href="{{  route('product', $randomBooks[2]->id) }}">
        <img src="{{$randomBooks[2]->picture}}" class="img-fluid z-depth-2 randomProductImage" alt="{{$randomBooks[2]->name}}">
      </a>

    </div>
    <!--Grid column-->

  </div>
  <!--Grid row-->

</div>

@endsection