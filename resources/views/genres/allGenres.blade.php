<!-- Genres Page -->

@extends('layouts.main')

@section('content')

<br><br><br><br>


@if (session('successMsg'))


<div class="alert alert-success" role="alert">
  {{ session('successMsg') }}
</div>

@endif

<div id="allGenresContainer">
  <div class="card-deck">
    @foreach($genres as $genre)
    <div class="card mb-3 mr-3 col-xs-4 z-depth-3">
      <img class="card-img-top" src="{{ $genre->picture }}" alt="{{ $genre->name }}">
      <div class="card-body">
        <h5 class="card-title">{{ $genre->name }}</h5>
        <p class="card-text"> {{ $genre->description }}</p>
      </div>
      <div class="card-footer text-center">
        <form action="{{route('allBooks')}}" method="get">
          <p class="card-text"><button class="btn defaultGradientButton text-white" type="submit" name="filterGenre" value="{{ $genre->id }}">See Books</button></p>
        </form>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection