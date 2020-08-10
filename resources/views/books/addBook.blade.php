<!-- dashboard provizoriu .. - Genres add page -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset=" UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>EmKrAn</title>
  <!-- icon -->
  <link rel="icon" href="{{ URL::asset('/mdb/img/blue-diamond-transparent.png') }}" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
   <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="{{  URL::asset('/mdb/css/bootstrap.min.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <!-- Material Design Bootstrap -->
  <link href="{{  URL::asset('/mdb/css/mdb.min.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{  URL::asset('/assets/css/bootstrap-multiselect.css') }}?v=<?php echo time(); ?>" type="text/css" />
  <link href="{{  URL::asset('/assets/css/style.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/navbar.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/advancedSearch.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/scart.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/advSearchInputs.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/tags.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/wishlist.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/contact.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/allBooks.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

</head>

<body style="margin:auto 25px;">
<!-- navbar admin -->
<div class="list-group list-group-horizontal">
  <a href="{{ route('dashboard') }}" class="list-group-horizontal list-group-item list-group-item-action">
    Home
  </a>
  <a href="{{ route('genres') }}" class="list-group-item list-group-item-action">Genres</a>
  <a href="{{ route('books') }}" class="list-group-item list-group-item-action active">Books</a>
  <a href="#!" class="list-group-item list-group-item-action">Customers</a>
  <a href="#!" class="list-group-item list-group-item-action disabled">Orders</a>
</div>
<!-- end navbar -->
<br>
<h3>Add a book to the database</h3>

<div class="container">

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
 {{$error}}
</div>
@endforeach

@endif
<!-- register genre form -->

<form class="text-center border border-light p-5" action="{{ route('storeB') }}" method = "POST">
{{ csrf_field() }}
    <div class="form-row mb-4">
        <div class="col">
            <!-- Book name -->
            <input type="text" name="bookName" id="bookName" class="form-control" placeholder="Name of the book">
        </div>
        <div class="col">
            <!-- Author -->
            <input type="text" name="bookAuthor" id="bookAuthor" class="form-control" placeholder="Author">
        </div>
    </div>
    <div class="form-row mb-4">
    <!-- Description -->
    <div class="col">
    <textarea rows=6 type="text" name="bookDescription" id="bookDescription" class="form-control" placeholder="Description" name="description"></textarea>
    </div>
    <!-- Details - Publisher, author etc -->
    <div class="col">
    <textarea rows=6 type="text" name="bookDetails" id="bookDetails" class="form-control" placeholder="Details" name="details"></textarea>
    </div>
    </div>
    <div class="form-row mb-4">
    <div class="col">
            <!-- Book Genre -->
            <!--div class="form-group"-->
          <select class="form-control" name="BookGenre" id="BookGenre">
            <option disabled="disabled" selected="selected">Genre</option>
           @foreach($genres as $genre)
           <option id="{{ $genre->id }} " value="{{ $genre->id }}">{{ $genre->name }}</option>
           @endforeach
          </select>
            <!--/div-->
    </div>
        <div class="col">
            <!-- Picture -->
            <input type="text" name="bookPicture" id="bookPicture" class="form-control" placeholder="Picture">
        </div>
    </div>
    <div class="form-row mb-4">
    <div class="col">
             <!-- Book Price -->
             <input type="text" name="bookPrice" id="bookPrice" class="form-control" placeholder="Price">
        </div>
        <div class="col">
            <!-- Quantity -->
            <input type="number" name="bookQuantity" id="bookQuantity" class="form-control" placeholder="Quantity">
        </div>
    </div>

    
    <!-- Add to db button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Book</button>


</form>


</div>

</body>
</html>