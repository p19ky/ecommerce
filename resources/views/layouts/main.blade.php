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

</head>

<body style="margin:auto 25px;">

  <!-- Start your project here-->
  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer')

  @include('layouts.modals')
  <!-- End your project here -->


  <!-- jQuery -->
  <script type="text/javascript" src="{{  URL::asset('/mdb/js/jquery.min.js') }}?v=<?php echo time(); ?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{  URL::asset('/mdb/js/popper.min.js') }}?v=<?php echo time(); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{  URL::asset('/mdb/js/bootstrap.min.js') }}?v=<?php echo time(); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{  URL::asset('/mdb/js/mdb.min.js') }}?v=<?php echo time(); ?>"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript" src="{{  URL::asset('/assets/js/navScript.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/searchModal.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/genreSelect.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/tag.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/shcart.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/bootstrap-multiselect.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/window.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/wishlist.js') }}?v=<?php echo time(); ?>"></script>
  <script type="text/javascript" src="{{  URL::asset('/assets/js/contact.js') }}?v=<?php echo time(); ?>"></script>


  <script type="text/javascript">
    // $(window).on('load', function() {
    //   $('#modalContact').modal('toggle');
    // });
  </script>


</body>

</html>