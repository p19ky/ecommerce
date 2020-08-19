@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Genres</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Genres</li>
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

<div class = "container">
<table class="table">
  <thead class="black white-text">
    <tr>
  
      <th scope="col"> 
      <a href="{{ route('admin.displayTableG') }}" class="btn-info btn">
      <i class="fa fa-plus" aria-hidden="true"></i>
      </a>
      </th>
      <th scope="col">Genre</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($genres as $genre)
    <tr>

      <td><a href="{{ route('admin.editG', $genre->id)}}"><img width="30%" src="{{$genre->picture}}" alt="no pic available" border="0"></a></td>
      <td>{{$genre->name}}</td>
      <td>{{$genre->description}}</td>
      <td width="20%">
      
      <a class="btn btn-raised btn-primary btn-sm" href="{{ route('admin.editG', $genre->id)  }}"><i class="fa fa-edit" aria-hidden="true"></i>
      </a>
      <form method="POST" id="deleteG-form-{{ $genre->id }}" action="{{ route('admin.delete', $genre->id) }}" style="display:none; ">
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
 <a href="{{ route('admin.displayTableG') }}" class="btn btn-info my-4 btn-block"><i class="fa fa-plus" aria-hidden="true"></i>
Add a genre</a>
</div>


</section>
@endsection