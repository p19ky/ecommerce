@extends('layouts.main')
@section('content')

<main id="homepageMain">
    <div style="opacity: 0.2;" class="parallax-empty-book"></div>

    <div id="fillUpWithDiv" class="text-center">
        <h1 id="fillUpWithDivTitle">Our Purpose is to ensure you with all the Books you have been thinking of reading. Search for those Books and fill up with Inspiration and Knowledge!</h1>
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
                <div class="card-footer text-center">
                    <a class="btn defaultGradientButton">See books</a>
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
        <br>
        <br>

    </div>
</main>
@endsection