@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Genres</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Genres</li>
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

<form class="text-center border border-light p-5" action="{{ route('admin.storeG') }}" method = "POST">
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

</section>
@endsection