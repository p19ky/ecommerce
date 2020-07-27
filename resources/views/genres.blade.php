@extends('layouts.main')
@section('content')
<br><br><br><br>
<h3>Genres</h3>
<table class="table">
  <thead class="black white-text">
    <tr>
  
      <th scope="col"></th>
      <th scope="col">Genre</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach($genres as $genre)
    <tr>

      <td><img width=30% src={{$genre->picture}} alt="no pic available" border="0"></td>
      <td>{{$genre->name}}</td>
      <td>{{$genre->description}}</td>
    </tr>
  
  @endforeach
  </tbody>
</table>


@endsection