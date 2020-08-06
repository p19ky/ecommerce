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
<table >
<?php
while($genre=current($genres))
{
  ?>
<tr>
<td>
<div class="card mb-3">
  <img class="card-img-top" src="{{ $genre->picture }}" alt="no pic available">
  <div class="card-body">
    <h5 class="card-title">{{ $genre->name }}</h5>
    <p class="card-text"> {{ $genre->description }}</p>
    <a href="#!"> <p class="card-text"><small class="text-muted"> See Books </small></p> </a>
  </div>
</div>
</td>
<?php
$genre = next($genres);
?>
<td>
<div class="card mb-3">
  <img class="card-img-top" src="{{ $genre->picture }}" alt="no pic available">
  <div class="card-body">
    <h5 class="card-title">{{ $genre->name }}</h5>
    <p class="card-text"> {{ $genre->description }}</p>
    <a href="#!"> <p class="card-text"><small class="text-muted"> See Books </small></p> </a>
  </div>
</div>
</td>
</tr>
<?php 
}
?>
</table>
</div>
@endsection


