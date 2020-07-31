@extends('layouts.main')
@section('content')
<br><br><br><br>
<h3>Genres</h3>

@if (session('successMsg'))


<div class="alert alert-success" role="alert">
{{ session('successMsg') }}
</div>

@endif

<div class = "container">
<table class="table">
  <thead class="black white-text">
    <tr>
  
      <th scope="col"></th>
      <th scope="col">Genre</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($genres as $genre)
    <tr>

      <td><img width="30%" src="{{$genre->picture}}" alt="no pic available" border="0"></td>
      <td>{{$genre->name}}</td>
      <td>{{$genre->description}}</td>
      <td>Edit | Delete</td>
    </tr>
  
  @endforeach
  </tbody>
</table>
 <!-- Add to db button -->
 <a href="{{ route('displayTableG') }}" class="btn btn-info my-4 btn-block">Add a genre to database</a>
</div>
@endsection