@extends('layouts.main')
@section('content')
<br><br><br><br>
<h3>Add a book to the database</h3>

<div class="container">
<!-- Default form register -->
<form class="text-center border border-light p-5" method="GET" action="{{ route('store') }}" method = "POST">


    <div class="form-row mb-4">
        <div class="col">
            <!-- Book Title and Picture -->
            <input type="text" id="Title" class="form-control" placeholder="Title" name="title">
            <input type="text" id="Picture" class="form-control" placeholder="Picture" name="picture">
            <input type="text" id="Price" class="form-control" placeholder="Price" name="price">
            <input type="number" id="Quantity" class="form-control" placeholder="Quantity" name="quantity">
            <select class="browser-default custom-select">
            <option selected>Pick a Genre</option>
                  <option name ="thriller" value="1">Thriller</option>
                 <option name="psych" value="2">Psychological Fiction</option>
            </select>

        </div>
        <div class="col">
            <!-- Description -->
            <textarea rows=3 type="text" id="Description" class="form-control" placeholder="Description" name="description"></textarea>
            <br>
            <textarea rows=3 type="text" id="Details" class="form-control" placeholder="Details" name="details"></textarea>
        </div>
    </div>

    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add</button>
  
</form>
<!-- Default form register -->

</div>

@endsection