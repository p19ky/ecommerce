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
  
      <th scope="col"> <a href="{{ route('displayTableG') }}" class="btn-info btn"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
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
      <td width="20%">
      
      <a class="btn btn-raised btn-primary btn-sm" href="{{ route('editG', $genre->id)  }}"><i class="fa fa-edit" aria-hidden="true"></i>
      </a>
      <form method="POST" id="deleteG-form-{{ $genre->id }}" action="{{ route('deleteG', $genre->id) }}" style="display:none; ">
     {{  csrf_field() }}
     {{  method_field('delete') }}
      </form>

    <button onclick=" if (confirm('Are you sure you want to delete this genre?')) {
      event.preventDefault();
      document.getElementById('deleteG-form-{{ $genre->id }}').submit();
    } else{
      event.preventDefault();

    } 
     "
       class="btn btn-raised btn-danger btn-sm" href=""><i class="fa fa-trash" aria-hidden="true"></i>  
      
    </button>
       </td>
    </tr>
  
  @endforeach
  </tbody>
</table>
 <!-- Add to db button -->
 <a href="{{ route('displayTableG') }}" class="btn btn-info my-4 btn-block"><i class="fa fa-plus" aria-hidden="true"></i>
Add a genre</a>
</div>
@endsection