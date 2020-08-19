@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Books</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Books</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="container">

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
 {{$error}}
</div>
@endforeach
@endif
<!-- register genre form -->

<form class="text-center border border-light p-5" action="{{ route('admin.updateB', $book->id) }}" method = "POST">
{{ csrf_field() }}
    <div class="form-row mb-4">
        <div class="col">
            <!-- Book name -->
            <label> Book Title </label>
            <input type="text" name="bookName" id="bookName" class="form-control" value="{{$book->name}}" placeholder="{{$book->name}}">
        </div>
        <div class="col">
            <!-- Author -->
            <label> Author </label>
            <input type="text" name="bookAuthor" id="bookAuthor" class="form-control" value="{{$book->author}}" placeholder="{{$book->author}}">
        </div>
    </div>

    <div class="form-row mb-4">
    <div class="col">
            <!-- Genre -->
           <label>Genre </label>
          <select class="form-control" name="bookGenre" id="bookGenre" value="{{$book->classification->name}}">
            <!--option disabled="disabled" selected="selected">{{$book->classification->name}}</option-->

            <option value="{{ $book->classification->id }}" {{ $book->classifId == $book->classification->id ? 'selected' : '' }}>{{ $book->classification->name }}</option>
           @foreach($genres as $genre)
           <option id="{{ $genre->id }} " value="{{ $genre->id }}">{{ $genre->name }}</option>
           @endforeach
          </select>
    </div>
        <div class="col">
            <!-- Picture -->
            <label>Picture</label>
            <input type="text" name="bookPicture" id="bookPicture" class="form-control" value="{{$book->picture}}" placeholder="{{$book->picture}}">
        </div>
    </div>
    <div class="form-row mb-4">
         <div class="col">
             <!-- Book Price -->
             <label>Price</label>
             <input type="text" name="bookPrice" id="bookPrice" class="form-control" value="{{$book->price}}" placeholder="{{$book->price}}">
        </div>
        <div class="col">
            <!-- Quantity -->
            <label>Quantity</label>
            <input type="number" name="bookQuantity" id="bookQuantity" class="form-control" value="{{$book->quantity}}" placeholder="{{$book->quantity}}">
        </div>
        <div class="col">
        <!--Language-->
        <label>Language</label>
        <input type="text" name="bookLanguage" id="bookLanguage" class="form-control" placeholder="Language" value="{{ $book->language }}">
        </div>
  </div>
    <div class="form-row mb-4">
        <div class="col">
        <label>Description</label>
        <textarea rows=5 type="text" name="bookDescription" id="bookDescription" class="form-control" placeholder="Description">{{$book->description}}</textarea>
        </div>
    </div>    
    <!-- Update to db button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update Book</button>


</form>


</div>

</section>
@endsection