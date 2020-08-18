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
        <a href="#!">
        <form action="{{route('allBooks')}}" method="get">
          <p class="card-text"><small class="text-muted"> <input name="filterGenre" id="filterGenre" value="See Books"> </small></p>
          </form>
        </a>
      </div>
    </div>
    @endforeach
  </div>

</div>
@endsection