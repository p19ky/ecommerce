@extends('layouts.main')

@section('content')
<!-- <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
Shopping Cart coming soon...
<br>
<br>
<br>
<br> -->

<!--Main layout-->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 style="color:#3061E2;" class="my-5 h2 text-center">Checkout</h2>

    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
    @endforeach
    @endif

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-6 mb-4">

        <!--Card-->
        <div class="card z-depth-2">

          <!--Card content-->
          <form class="card-body" action="{{ route ('storeO', $user->id) }}" method="POST">
          {{ csrf_field() }}
            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-6">

                <!--firstName-->
                <div class="md-form ">
                  <input type="text" id="firstName" name="firstName" class="form-control" required>
                  <label for="firstName" class="">First name</label>
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6">

                <!--lastName-->
                <div class="md-form">
                  <input type="text" id="lastName" name="lastName" class="form-control" required>
                  <label for="lastName" class="">Last name</label>
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" id="email" name="email" class="form-control">
              <label for="email" class="">Email (optional)</label>
            </div>
            <!--email-->


            <!--address - street name, number -->
            <div class="md-form mb-5">
              <div class="col">
              <input type="text" id="street" name="street" class="form-control" placeholder="Location, Main St" required>
              <label for="street" class="">Street Name</label>
              </div>
              <div class="col">
              <input type="text" id="number" name="number" class="form-control" placeholder="1234" required>
              <label for="number" class="">No.</label>
            </div></div>

             <!--address - building, apartment-->
             <div class="md-form mb-5">
              <div class="col">
              <input type="text" id="building" name="building" class="form-control" placeholder="A6B" required>
              <label for="building" class="">Building</label>
              </div>
              <div class="col">
              <input type="text" id="apartment" name="apartment" class="form-control" placeholder="1234" required>
              <label for="apartment" class="">Apartment</label>
            </div></div>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="" required>
                <div class="invalid-feedback">
                  Country required.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                <div class="invalid-feedback">
                  City required.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="county">County/Region</label>
                <input type="text" class="form-control" id="county" name="county" placeholder="" required>
                <div class="invalid-feedback">
                  County/Region required.
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address" checked>
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>

            <hr>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="16 Digit Number" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="MM/YY" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="3 Digit Number" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-default btn-lg btn-block defaultGradientButton" type="submit">Continue to checkout</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="checkoutShcart col-lg-6 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span id="checkoutShcartBadge" class="badge badge-pill z-depth-2">0</span>
        </h4>

        <!-- Cart -->
        <ul id="checkoutShcartBookslist" class="list-group mb-3 z-depth-2">
        </ul>
        <!-- Cart -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>

@endsection