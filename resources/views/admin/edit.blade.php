@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
 {{$error}}
</div>
@endforeach
@endif


@if (session('successMsg'))
<div class="alert alert-success" role="alert">
{{ session('successMsg') }}
</div>
@endif

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('admin.update', $user->id)}}" method="POST">
{{ csrf_field() }}
    <p class="h4 mb-4">Edit user</p>

    <div class="form-group">
            <label>Give Role</label>
            
          <select class="form-control" name="usertype" id="usertype" value="{{ $user->roles['name'] }}">
            <!--option disabled="disabled" selected="selected">{{$user->roles['name']}}</option-->

            <option value="{{ $user->roles['id'] }}" {{ $user->role_id == $user->roles['id'] ? 'selected' : '' }}>{{ $user->roles['name'] }}</option>
           @foreach($roles as $role)
           <option id="{{ $role->id }} " value="{{ $role->id }}">{{ $role->name }}</option>
           @endforeach
          </select>
                <!-- <select value="{{ $user->role_id }}" name="usertype">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                   
                </select>
            </div>
     -->
    <div class="form-row mb-4">
        
        <div class="col">
            <!-- Name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" value="{{ $user->firstName }}" name="firstName" placeholder="First Name">
        </div>
        <div class="col">
            <input type="text" id="defaultRegisterLastName" class="form-control" value="{{ $user->lastName }}" name="lastName" placeholder="Last Name">
        </div>
    </div>

   
    <div class="form-row">
    
        <div class="col">
        <input type="text" id="defaultRegisterFormUserame" class="form-control" value="{{ $user->username }}" name="username" placeholder="Username">
        </div>

        <div class="col">
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" value="{{ $user->email }}" name="email" placeholder="E-mail">
        </div>
    </div>
       

   

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>

    <!-- Social register -->
    
</form>
</div>
@endsection