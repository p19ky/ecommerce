@extends('layouts.main')
@section('content')
<br><br><br><br>
<h3>Add a book genre to the database</h3>

<div class="container">

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
 {{$error}}
</div>
@endforeach

@endif
<!-- register genre form -->

<form class="text-center border border-light p-5" action="{{ route('storeG') }}" method = "POST">
{{ csrf_field() }}
    <div class="form-row mb-4">
        <div class="col">
            <!-- Genre name -->
            <input type="text" name="genreName" id="genreName" class="form-control" placeholder="Name of the genre">
        </div>
        <div class="col">
            <!-- Picture -->
            <input type="text" name="genrePicture" id="genrePicture" class="form-control" placeholder="Picture">
        </div>
    </div>
    <div class="form-row mb-4">
    <!-- Description -->
    <textarea rows=3 type="text" name="genreDescription" id="genreDescription" class="form-control" placeholder="Description" name="description"></textarea>
    </div>
    
    <!-- Add to db button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Genre</button>


</form>


</div>

@endsection