@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <p>
            <a href="{{ route('admin.create')}}" class="btn btn-primary">Add new user</a>
        </p>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstName }}</td>
                    <td><a href="{{ route('admin.edit', $user->id)}}" class="btn btn-info">Edit</a> 

                   <form method="POST" id="delete-form-{{ $user->id }}" action="{{ route('admin.delete', $user->id) }}" style="display:none; ">
                    {{  csrf_field() }}
                    {{  method_field('delete') }}
                    </form>

                    <button onclick=" if (confirm('Are you sure you want to delete this user?')) {
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $user->id }}').submit();
                    } else{
                    event.preventDefault();

                    } 
                    "
                    class="btn btn-danger" href="">Delete  
                    
                    </button>
     
                   </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection