<@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Books</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Books</li>
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

<form class="text-center border border-light p-5" action="{{ route('admin.storeB') }}" method = "POST">
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
    <div class="col">
            <!-- Book Genre -->
          <select class="form-control" name="bookGenre" id="bookGenre">
            <option disabled="disabled" selected="selected">Genre</option>
           @foreach($genres as $genre)
           <option id="{{ $genre->id }} " value="{{ $genre->id }}">{{ $genre->name }}</option>
           @endforeach
          </select>
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
        <div class="col">
        <input type="text" name="bookLanguage" id="bookLanguage" class="form-control" placeholder="Language">
        </div>
    </div>
    <div class="form-row mb-4">
     
      <div class="col">
      <textarea rows=5 type="text" name="bookDescription" id="bookDescription" class="form-control" placeholder="Description"></textarea>
      </div>
    </div>
    
    <!-- Add to db button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add Book</button>


</form>


</div>

</section>
@endsection