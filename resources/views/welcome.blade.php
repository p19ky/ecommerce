@extends('layouts.main')
@section('content')

<main id="homepageMain">
    <div style="opacity: 0.2;" class="parallax-empty-book"></div>

    <div id="fillUpWithDiv" class="text-center">
<<<<<<< HEAD
        <h1 id="fillUpWithDivTitle">FILL UP WITH INSPIRATION AND KNOWLEDGE</h1>
=======
        <h1 id="fillUpWithDivTitle">Our Purpose is to ensure you with all the Books you have been thinking of reading. Search for those Books and fill up with Inspiration and Knowledge!</h1>
>>>>>>> d1b4fd28063e0e2f82a44bc974fb6a3ba4069668
    </div>

    <div style="opacity: 1;" class="parallax-empty-book"></div>

    <div id="homepageContentContainer">


        <div class="text-center groupOfCardsTitle wow animate__backInLeft">
            <div style="padding-top: 38px;">Our Genres</div>
        </div>

    

       
        <div class="card-deck genreCardDeck wow animate__backInRight">

            @foreach($classifications as $genre)

            <div class="card mb-2 z-depth-2">
                <img class="card-img-top" src="{{$genre->picture}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$genre->name}}</h4>
                    <p class="card-text">{{$genre->description}}</p>
                </div>
<<<<<<< HEAD
                <div class="card-footer">
                <form action="{{route('allBooks')}}" method="get">
                <p class="card-text"><button class="btn defaultGradientButton text-white" type="submit" name="filterGenre" value="{{ $genre->id }}">See Books</button></p>
                 </form>
=======
                <div class="card-footer text-center">
                    <a class="btn defaultGradientButton">See books</a>
>>>>>>> d1b4fd28063e0e2f82a44bc974fb6a3ba4069668
                </div>
            </div>

            @endforeach

        </div>

        <br>
        <br>
        <hr style="margin:0px;">

        <div class="text-center groupOfCardsTitle wow animate__backInRight">
            <div style="padding-top: 38px;">Some of our Books
            </div>
        </div>


        <div class="card-deck randomBooksCardDeck wow animate__backInLeft">

            @foreach($randomBooks as $randie)

            <div class="card mb-2 z-depth-2 randomBookCard">
                <a href="{{  route('product', $randie->id) }}">
                    <img style="max-height: 300px;" class="card-img-top imageOpacityChanger" src="{{$randie->picture}}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <a style="color:#212529;" href="{{  route('product', $randie->id) }}">
                        <h4 class="card-title">{{$randie->name}}</h4>
                    </a>
                    <p class="card-text">by {{$randie->author}}</p>
                    <p class="text-bold">{{ $classifications->where('id', '=', $randie->classifId)->first()->name }}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div style="padding:0px;" class="col-7"><a href="{{  route('product', $randie->id) }}" data-toggle="tooltip" data-placement="bottom" title="See book details" class="btn defaultGradientButton text-left"><i class="fas fa-book-open"></i></a></div>
                        <div style="padding-top:15px;" class="col-5 text-right">
                            <small class="card-text">${{$randie->price}}</small>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>

        <br>
        <br>
        <hr>

<h2 style="text-align:center;">GENRES</h2><hr>
<div style="width:900px; height:600px;" id="carouselExampleControls" class="defaultGradientButton container carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
   @foreach( $classifications as $genre )
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
   @endforeach
  </ol>

  <div style="float:center;" class="carousel-inner" role="listbox">
  
    @foreach( $classifications as $genre )
       <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
       <form action="{{route('allBooks')}}" method="get">
          <button style="vertical-align:center; margin-top:3%; margin-left:auto; margin-right:auto; display:block;" class="btn defaultGradientButton" type="submit" name="filterGenre" value="{{ $genre->id }}">
      
           <img style="vertical-align:center; margin-top:2%; margin-left:auto; margin-right:auto; display:block; max-width:620px; height:500px;" class="d-block img-fluid" src="{{ $genre->picture }}" alt="no img available">
              <div style=" max-width:auto; border-radius:2px; bottom:0%; opacity:0.8; color:black;" class=" block defaultGradientButton carousel-caption d-none d-md-block">
                 <h3>{{ $genre->name }}</h3>
                 <p>{{ $genre->description }}</p>
              </div>
              </button>
        </form>
       </div>
    @endforeach
  </div>  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>





<br><br><br><hr.<br><br>




    </div>
</main>
@endsection