<!-- dashboard provizoriu .. - Genres -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset=" UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>EmKrAn</title>
  <!-- icon -->
  <link rel="icon" href="{{ URL::asset('/mdb/img/blue-diamond-transparent.png') }}" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
   <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="{{  URL::asset('/mdb/css/bootstrap.min.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <!-- Material Design Bootstrap -->
  <link href="{{  URL::asset('/mdb/css/mdb.min.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{  URL::asset('/assets/css/bootstrap-multiselect.css') }}?v=<?php echo time(); ?>" type="text/css" />
  <link href="{{  URL::asset('/assets/css/style.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/navbar.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/advancedSearch.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/scart.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/advSearchInputs.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/tags.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/wishlist.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/contact.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link href="{{  URL::asset('/assets/css/allBooks.css') }}?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

</head>

<body style="margin:auto 25px;">
<!-- navbar admin -->
<div class="list-group list-group-horizontal">
  <a href="{{ route('dashboard') }}" class="list-group-horizontal list-group-item list-group-item-action">
    Home
  </a>
  <a href="{{ route('genres') }}" class="list-group-item list-group-item-action active">Genres</a>
  <a href="{{ route('books') }}" class="list-group-item list-group-item-action">Books</a>
  <a href="#!" class="list-group-item list-group-item-action">Customers</a>
  <a href="#!" class="list-group-item list-group-item-action disabled">Orders</a>
</div>
<!-- end navbar -->
<br>

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
      <a href="{{ route('displayTableG') }}" class="btn-info btn">
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

      <td><a href="{{ route('editG', $genre->id)}}"><img width="30%" src="{{$genre->picture}}" alt="no pic available" border="0"></a></td>
      <td>{{$genre->name}}</td>
      <td>{{$genre->description}}</td>
      <td width="20%">
      
      <a class="btn btn-raised btn-primary btn-sm" href="{{ route('editG', $genre->id)  }}"><i class="fa fa-edit" aria-hidden="true"></i>
      </a>
      <form method="POST" id="deleteG-form-{{ $genre->id }}" action="{{ route('deleteG', $genre->id) }}" style="display:none; ">
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
 <a href="{{ route('displayTableG') }}" class="btn btn-info my-4 btn-block"><i class="fa fa-plus" aria-hidden="true"></i>
Add a genre</a>
</div>


</body>
</html>