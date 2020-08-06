<!-- Genres Page -->

@extends('layouts.main')

@section('content')

<br><br><br><br>


@if (session('successMsg'))


<div class="alert alert-success" role="alert">
{{ session('successMsg') }}
</div>

@endif

<div class = "container">
<h3>Genres</h3>
@foreach($genres->chunk(10) as $chunkedGenre)
<div class="row">
@foreach($chunkedGenre as $genre)
<div class="card mb-3 col-xs-4" style="width:50%">
  <img class="card-img-top" src="{{ $genre->picture }}" alt="no pic available">
  <div class="card-body">
    <h5 class="card-title">{{ $genre->name }}</h5>
    <p class="card-text"> {{ $genre->description }}</p>
    <a href="#!"> <p class="card-text"><small class="text-muted"> See Books </small></p> </a>
  </div>
</div>
@endforeach
</div>
@endforeach
</div>
@endsection


