<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div id="navContainer" class="container">

    <!-- Brand -->
    <a id="logoLink" data-placement="bottom" data-toggle="tooltip" title="Home Page" class="navbar-brand" href="{{  url('/') }}">
      <img id="bookLogo" src=" {{ asset('public/mdb/img/blue-book-transparent.png') }}" alt="book" width="50" height="50">
    </a>

    <!-- Search -->
    <div class="s130">
      <form>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="svg-wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </div>
            <input id="search" type="text" placeholder="Find books" />
          </div>
          <div class="input-field second-wrap">
            <button class="btn-search" type="button">Search</button>
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
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank"><span class="navbarText">All Books</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{  url('/genres') }}" target="_blank"><span class="navbarText">Genres</span></a>
        </li>
        <li class="nav-item">
          <a id="userLogo" class="nav-link" href="{{ backpack_url() }}" target="_blank"><span data-placement="bottom" data-toggle="tooltip" title="My Account" class="navbarText"><i class="fa fa-user"></i></span></a>
        </li>
        <li class="nav-item">
          <a id="shoppingCart" class="nav-link" href="{{  url('/shoppingCart') }}" target="_blank"><span data-placement="bottom" data-toggle="tooltip" title="Shopping Cart" class="navbarText"><i class="fas fa-shopping-cart"></i></span></a>
        </li>
        <li id="moreDropdownListItem" class="nav-item">
          <div class="dropdown">
            <a id="moreDropDownLink" class="nav-link dropdown-toggle caret-off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="navbarText">More<i id="moreIcon" class="fas fa-arrow-right"></i></span></a>

            <div id="moreDropdownMenu" class="dropdown-menu dropdown-primary fade">
              <a class="dropdown-item nav-link" data-toggle="modal" data-target="#advancedSearchModal"><span id="advancedSearchSpan">
                  Advanced Search <i class="fas fa-search-plus"></i></span></a>
              <a class="dropdown-item nav-link"><span id="contactSpan">Contact <i class="fas fa-phone-square-alt"></i></span></a>
              <a class="dropdown-item nav-link"><span id="wishlistSpan">Wishlist <i class="fas fa-heart"></i></span></a>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
</nav>
<!-- Navbar -->