<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div id="navContainer" class="container">

    <!-- Brand -->
    <a id="logoLink" data-placement="bottom" data-toggle="tooltip" title="Home Page" class="navbar-brand" href="{{  url('/') }}">
      <img id="bookLogo" src=" {{ asset('/mdb/img/blue-book-transparent.png') }}" alt="book" width="50" height="50">
    </a>

    <!-- Search -->
    <div class="s130">
      <form action="{{ route('allBooks') }}" method="POST" role="search">
      {{ csrf_field() }}
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="svg-wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </div>
            <input name="main_search" id="search" type="text" placeholder="Find books" />
          </div>
          <div class="input-field second-wrap">
            <input class="btn-search" type="submit" value="Search">
          </div>
        </div>
      </form>
    </div>


    <!-- Collapse -->
    <button id="collapsedToggleButton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="d-flex justify-content-end collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Right -->
      <ul class="navbar-nav">

        <!-- All Books -->
        <li class="nav-item">
          <a class="nav-link" href="{{  url('/allBooks') }}"><span class="navbarText">All Books</span></a>
        </li>

        <!-- Genres -->
        <li class="nav-item">
          <a class="nav-link" href="{{  url('/allGenres') }}"><span class="navbarText">Genres</span></a>
        </li>

        <!-- User Login/SignUp -->
        @auth
        <li class="nav-item">
          <a id="userLogo" class="nav-link" href="{{ url('/login') }}"><span data-placement="bottom" data-toggle="tooltip" title="My Account" class="navbarText"><i class="fa fa-user"></i></span></a>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a id="userLogo" class="nav-link" href="{{ url('/login') }}"><span data-placement="bottom" data-toggle="tooltip" title="Login/Sign Up" class="navbarText"><i class="fa fa-user"></i></span></a>
        </li>
        @endguest

        <!-- Shopping Cart -->
        <li class="nav-item">
          <a id="shoppingCart" class="nav-link"><span class="navbarLinkColorizer"><i id="shoppingCartIcon" class="shcartTooltip fas fa-shopping-cart">
                <div class="shcartTooltiptext">
                  <div class="container">
                    <div class="shopping-cart">
                      @auth
                      <div class="shopping-cart-header">
                        <i class="fas fa-shopping-cart"></i><span id="shcartBadge" class="badge">0</span>
                        <div class="shopping-cart-total d-flex justify-content-end">
                          <span class="lighter-text">Total:</span>
                          <span id="shcartTotal" class="main-color-text">$0.00</span>
                        </div>
                      </div>
                      <!-- This list contains the Shopping Cart Items. -->
                      <ul id="shoppingCartItems" class="shopping-cart-items">
                      </ul>
                      <button onclick="window.location.href=`{{  route('shcart', auth()->user()->id) }}`" id="shcartCheckout" type="button" class="btn">Go To Cart</button>

                      @endauth
                      @guest
                      <div style="margin-left:40px;">
                        <p><strong>You have to login first!</strong></p>
                        <button onclick="window.location.href=`{{  url('/login') }}`" class="btn reversedGradientButton">Login</button>
                      </div>
                      @endguest
                    </div>
                  </div>
                </div>
              </i></span></a>
        </li>

        <!-- More -->
        <li id="moreDropdownListItem" class="nav-item">
          <div class="dropdown">
            <a id="moreDropDownLink" class="nav-link dropdown-toggle caret-off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="navbarText">More<i id="moreIcon" class="fas fa-arrow-right"></i></span></a>

            <div id="moreDropdownMenu" class="dropdown-menu dropdown-primary fade">

              <!-- Advanced Search -->
              <a class="dropdown-item nav-link" data-toggle="modal" data-target="#advancedSearchModal"><span id="advancedSearchSpan">
                  Advanced Search <i class="fas fa-search-plus"></i></span></a>

              <!-- Wishlist -->
              <a data-toggle="modal" data-target="#modalWishlist" class="dropdown-item nav-link"><span id="wishlistSpan">Wishlist <i class="fas fa-heart"></i></span></a>

              <!-- Contact -->
              <a class="dropdown-item nav-link" data-toggle="modal" data-target="#modalContact"><span id="contactSpan">Contact <i class="fas fa-phone-square-alt"></i></span></a>

              <!-- Feedback -->
              <a onclick="modalBackdropTrigger()" data-toggle="modal" data-target="#feedbackModal" class="dropdown-item nav-link"><span id="feedbackSpan">Feedback <i class="fas fa-comments"></i></span></a>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
</nav>
<!-- Navbar -->