@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('admin.index')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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
  
      
      <th scope="col">Total</th>
      <th scope="col">First and Last Name</th>
      <th scope="col">Street</th>
      <th scope="col">Number</th>
      <th scope="col">City</th>
      <th scope="col">County</th>
      <th scope="col">Country</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

  @php
  use App\Orders;
  $orders=Orders::all();
  @endphp
  @foreach($orders as $order)
    <tr>

      
      <td>${{$order->totalPrice}}</td>
      <td>{{$order->firstName}} {{$order->lastName}}</td>
      <td>{{$order->street}}</td>
      <td>{{$order->number}}</td>
      <td>{{$order->city}}</td>
      <td>{{$order->county}}</td>
      <td> {{ $order->country }} </td>
      <td> Paid with Card </td>
      <td> {{ $order->date }} </td>
      <td width="20%">
    </tr>
  
  @endforeach
  </tbody>
</table>

</div>


</section>
@endsection