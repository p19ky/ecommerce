@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('user.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
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
<form class="text-center border border-light p-5" action="{{ route('user.profile.update')}}" method="POST">
{{ csrf_field() }}
    <p class="h4 mb-4">My account</p>

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
    <label>Address</label>
    <div class="form-row">
    
        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormStreet" class="form-control" value="{{ $user->street }}" name="street" placeholder="Street">
        </div>

        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormNumber" class="form-control" value="{{ $user->number }}" name="number" placeholder="Number">
        </div>

        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormBuilding" class="form-control" value="{{ $user->building }}" name="building" placeholder="Building">
        </div>

    </div>

    <div class="form-row">
    
        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormApartment" class="form-control" value="{{ $user->apartment }}" name="apartment" placeholder="Apartment">
        </div>

        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormCity" class="form-control" value="{{ $user->city }}" name="city" placeholder="City">
        </div>

        <div class="col-md-4 mb-3">
        <input type="text" id="defaultRegisterFormCounty" class="form-control" value="{{ $user->county }}" name="county" placeholder="County">
        </div>

    </div>

   

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>

    <!-- Social register -->
    
</form>
</div>
@endsection