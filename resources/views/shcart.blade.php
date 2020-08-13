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

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-6 mb-4">

        <!--Card-->
        <div class="card z-depth-2">

          <!--Card content-->
          <form class="card-body">

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-6">

                <!--firstName-->
                <div class="md-form ">
                  <input type="text" id="firstName" class="form-control" required>
                  <label for="firstName" class="">First name</label>
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-md-6">

                <!--lastName-->
                <div class="md-form">
                  <input type="text" id="lastName" class="form-control" required>
                  <label for="lastName" class="">Last name</label>
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" id="email" class="form-control">
              <label for="email" class="">Email (optional)</label>
            </div>
            <!--email-->


            <!--address-->
            <div class="md-form mb-5">
              <input type="text" id="address" class="form-control" placeholder="Location, 1234 Main St" required>
              <label for="address" class="">Address</label>
            </div>

            <!--address-2-->
            <div class="md-form mb-5">
              <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
              <label for="address-2" class="">Address 2 (optional)</label>
            </div>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">Country</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Country required.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">City</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  City required.
                </div>

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

            <hr>

            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
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
      <div class="col-lg-6 mb-4">

        <!-- Heading -->
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span style="background-color:#D647D8;" class="checkoutShcartBadge badge badge-pill">3</span>
        </h4>

        <!-- Cart -->
        <ul class="checkoutShcartBookslist list-group mb-3 z-depth-2">
          <li class="list-group-item checkoutShcartItem">
            <div class="checkoutShcartItemFirstContentDiv" style="display:grid; grid-template-columns:30% 40% 30%;">
              <img style="align-self:center; border-radius:5px;" src="https://i.ibb.co/PZNmcyJ/the-snowman.jpg" width="90" height="90">
              <div class="text-center">
                <h6 style="word-wrap:break-word;" class=" checkoutShcartItemName">Book the 7</h6>
                <small class="text-center checkoutShcartItemAuthor text-muted">by Author Name</small>
              </div>
              <span class="text-right checkoutShcartItemPrice text-muted">$122.00</span>
            </div>
            <div class="emptyDivForShcartItem"></div>
            <div class="checkoutShcartItemSecondContentDiv" style="display:grid; grid-template-columns:10% 40% 40% 10%;">
              <div class="emptyDivForShcartItem"></div>
              <div class="text-center">- Quan +</div>
              <div class="text-center">Quantity: 1</div>
              <div class="emptyDivForShcartItem"></div>
            </div>
            <div class="emptyDivForShcartItem"></div>
          </li>
          <li class=" list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong id="checkoutShcartTotal">$20.00</strong>
          </li>
        </ul>
        <!-- Cart -->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>

@endsection