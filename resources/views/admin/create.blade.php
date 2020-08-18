@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Users</li>
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
<form class="text-center border border-light p-5" action="{{ route('admin.store')}}" method="POST">
{{ csrf_field() }}
    <p class="h4 mb-4">Add user</p>

    <div class="form-group">
            <label>Give Role</label>
                <select name="usertype">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                    <!-- Role -->
                    <!-- <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Role"> -->
                </select>
            </div>
    <div class="form-row mb-4">
        
        <div class="col">
            <!-- Name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="firstName" placeholder="First Name">
        </div>
        <div class="col">
            <input type="text" id="defaultRegisterLastName" class="form-control" name="lastName" placeholder="Last Name">
        </div>
    </div>

   
    <div class="form-row">
    
        <div class="col">
            <input type="text" id="defaultRegisterFormUserame" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="col">
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">
        </div>
    </div>
    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" class="form-control" name="password" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters
    </small>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Add data</button>

    <!-- Social register -->
    
</form>
</div>
@endsection