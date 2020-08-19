@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Books</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Books</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<section class = "container">
@if (session('successMsg'))


<div class="alert alert-success" role="alert">
{{ session('successMsg') }}
</div>

@endif
<table class="table">
  <thead class="black white-text">
    <tr>
  
      <th scope="col"> 
      <a href="{{ route('admin.displayTableB') }}" class="btn-info btn">
      <i class="fa fa-plus" aria-hidden="true"></i>
      </a>
      </th>
      <th scope="col">Book</th>
      <th scope="col">Author</th>
      <th scope="col">Genre</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
      <th scope="col">Language</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($books as $book)
    <tr>

      <td><a href="{{ route('admin.editB', $book->id)}}"><img width="30%" src="{{$book->picture}}" alt="no pic available" border="0"></img></td>
      <td>{{$book->name}}</td>
      <td>{{$book->author}}</td>
      <td>{{$book->classification['name']}}</td>
      <td>{{$book->price}}</td>
      <td>{{$book->quantity}}</td>
      <td>{{$book->description}}</td>
      <td> {{ $book->language }} </td>
      <td width="20%">
      
      <a class="btn btn-raised btn-primary btn-sm" href="{{ route('admin.editB', $book->id)}}"><i class="fa fa-edit" aria-hidden="true"></i>
      </a>
      <form method="POST" id="deleteB-form-{{ $book->id }}" action="{{ route('admin.deleteB', $book->id) }}" style="display:none; ">
     {{  csrf_field() }}
     {{  method_field('delete') }}
      </form>

    <button onclick=" if (confirm('Are you sure you want to delete this book?')) {
      event.preventDefault();
      document.getElementById('deleteB-form-{{ $book->id }}').submit();
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
 <a href="{{ route('admin.displayTableB') }}" class="btn btn-info my-4 btn-block"><i class="fa fa-plus" aria-hidden="true"></i>
Add a book</a>
</div>


</section>
@endsection