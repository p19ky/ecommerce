@auth
<div style="display:none;" id="hiddenCheckForAuth">{{ auth()->user()->id }}</div>
@endauth

<!-- Start-FeedbackModal -->

<div class="modal fade right" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="FeedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div id="feedbackModalContent" class="modal-content">
      <!--Header-->
      <div id="feedbackModalHeader" class="modal-header">
        <p class="heading lead"><i style="color:#fff;" class="fas fa-comments"></i> Feedback request</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">×</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
          <p>
            <strong>Your opinion matters</strong>
          </p>
          <p>Have some ideas for improvements?
            <strong>Give us your feedback.</strong>
          </p>
        </div>

        <hr>

        <!-- Radio -->
        <p class="text-center">
          <strong>Your experience with our services</strong>
        </p>
        <div class="form-check mb-4">
          <input class="form-check-input" name="group1" type="radio" id="radio-179" value="Very Good" checked>
          <label class="form-check-label" for="radio-179">Very good</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="group1" type="radio" id="radio-279" value="Good">
          <label class="form-check-label" for="radio-279">Good</label>
        </div>

        <div class="form-check mb-4">
          <input class="form-check-input" name="group1" type="radio" id="radio-379" value="Mediocre">
          <label class="form-check-label" for="radio-379">Mediocre</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" name="group1" type="radio" id="radio-479" value="Bad">
          <label class="form-check-label" for="radio-479">Bad</label>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" name="group1" type="radio" id="radio-579" value="Very Bad">
          <label class="form-check-label" for="radio-579">Very bad</label>
        </div>
        <!-- Radio -->

        <p class="text-center">
          <strong>What could we improve?</strong>
        </p>
        <!--Basic textarea-->
        <div class="md-form">
          <textarea type="text" id="form79textarea" class="md-textarea form-control" rows="3"></textarea>
          <label for="form79textarea">Your message</label>
        </div>

      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a data-dismiss="modal" type="button" class="btn btn-primary waves-effect waves-light">Send
          <i class="fa fa-paper-plane ml-1"></i>
        </a>
        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </div>
  </div>
</div>

<!-- End-FeedbackModal -->

<!-- Start-AdvancedSeachModal -->

<div class="modal fade" id="advancedSearchModal" tabindex="-1" role="dialog" aria-labelledby="advancedSearchModalLabel" aria-hidden="true">
  <div id="advancedSearchModalDialog" class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div id="advancedSearchModalContent" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeaderTitle">Advanced Search <i class="fas fa-search-plus"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
              <form class="" action="#!">

                <!-- Title -->
                <div class="md-form">
                  <input type="text" id="titleInput" class="form-control advSearchInput">
                  <label class="advSearchLabel" for="titleInput">Title</label>
                </div>

                <!-- Author -->
                <div class="md-form">
                  <input type="text" id="authorInput" class="form-control advSearchInput">
                  <label class="advSearchLabel" for="authorInput">Author</label>
                </div>

                <!-- Language -->
                <div class="md-form">
                  <input type="text" id="languageInput" class="form-control advSearchInput">
                  <label class="advSearchLabel" for="languageInput">Language</label>
                </div>

                <!-- Tags -->
                <div class="md-form">
                  <input onfocusout="labelChangerToDefault()" type="text" id="tagsInput" class="main-input form-control advSearchInput">
                  <label id="tagsInputLabel" class="advSearchLabel" for="tagsInput">Tags</label>

                  <br>

                  <div id="divTagContainer" class="tags-input" data-name="tags-input">
                    <!-- <span class="tag"><span class="tagTextSpan">HTML <i class="closeTagIcon fas fa-times"></i></span></span>
                    <span class="tag"><span class="tagTextSpan">CSS <i class="closeTagIcon fas fa-times"></i></span></span> -->
                    <!-- THESE COMMENTS ARE FOR TEST PURPOSE - DON'T DELETE!!! -->
                  </div>
                </div>



                <div class="row">
                  <div class="col-4">
                  </div>
                  <div class="col-4" id="genreSelectContainer">
                    <h5>Select Genre(s):</h5>
                    <select id="genreSelect" multiple="multiple">
                      <option value="Fantasy">Psychological Fiction</option>
                      <option value="Sci-Fi">Thriller</option>
                      <option value="Mystery">Crime</option>
                      <option value="Romance">History</option>
                    </select>
                  </div>
                  <div class="col-4"></div>
                </div>


              </form>
            </div>
            <div class="col-1"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button id="modalCancelButton" type="button" class="btn" data-dismiss="modal">Cancel</button>
        <button id="modalSearchButton" type="button" class="btn" data-dismiss="modal">Search</button>
      </div>
    </div>
  </div>
</div>

<!-- End-AdvancedSeachModal -->

<!--Modal: Start-modalConfirmDeleteByDeleteButton-->
<div class="modal fade" id="modalConfirmDeleteShcartElement" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteShcartElementLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a id="confirmDeleteShcartElementYes" type="button" class="btn  btn-outline-danger" data-dismiss="modal">Yes</a>
        <a id="confirmDeleteShcartElementNo" type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: End-modalConfirmDeleteByDeleteButton-->

<!-- Modal: Start-modalWishlist -->
<div class="modal fade" id="modalWishlist" tabindex="-1" role="dialog" aria-labelledby="modalWishlistLabel" aria-hidden="true">
  <div id="modalWishlistDialog" class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div id="modalWishlistContent" class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 id="wishlistHeaderTitle" class="modal-title" id="myModalLabel">Your Wishlist <i class="fas fa-grin-hearts"></i></h4>
        <button id="wishlistHeaderClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div id="wishlistModalBody" class="modal-body">
        <!-- Here will be the wishlist Items added. -->
      </div>
      <!--Footer-->
      <div class="d-flex justify-content-md-between modal-footer">
        <button id="closeModalWishlistButton" type="button" class="btn" data-dismiss="modal">Close</button>
        <button onclick="window.location.href=`{{  url('/allBooks') }}`" id="seeAllBooks" type="button" class="btn" data-dismiss="modal">Books</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: End-modalWishlist -->

<!-- Start - Modal - Contact -->

<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel" aria-hidden="true">

  <div id="contactModalDialog" class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div id="contactModalContent" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalTitle">Contact <i class="fas fa-phone-square-alt"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!--Section: Contact v.1-->
        <section class="section pb-5">

          <div class="row">

            <!--Grid column-->
            <div class="col-lg-5 mb-4">

              <!--Form with header-->
              <div id="contactFormCard" class="card">

                <div style="position:relative;" class=" card-body">
                  <!--Header-->
                  <div class="text-center form-header">
                    <h3><i class="fas fa-envelope"></i> <strong>Write to us:</strong></h3>
                  </div>

                  <br>
                  <p>We'll reply as soon as possible. <i class="fas fa-smile-beam"></i></p>

                  <!--Body-->
                  <form id="contactForm">

                    <div class="md-form">
                      <i class="fas fa-user prefix white-text"></i>
                      <input name="name" type="text" id="contactYourName" class="form-control contactInput">
                      <label class="contactInputLabel" for="contactYourName">Your name</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-envelope prefix white-text"></i>
                      <input name="email" type="text" id="contactYourEmail" class="form-control contactInput">
                      <label class="contactInputLabel" for="contactYourEmail">Your email</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-tag prefix white-text"></i>
                      <input name="subject" type="text" id="contactSubject" class="form-control contactInput">
                      <label class="contactInputLabel" for="contactSubject">Subject</label>
                    </div>

                    <div class="md-form">
                      <i class="fas fa-pencil-alt prefix white-text"></i>
                      <textarea name="message" id="contactYourThoughts" class="form-control md-textarea contactInput" rows="6"></textarea>
                      <label class="contactInputLabel" for="form-text">Your Thoughts</label>
                    </div>

                    <div class="text-center mt-4">
                      <button name="send" type="submit" id="contactFormSubmitButton" class="btn defaultGradientButton">Submit <i id="submitArrow" class="fas fa-long-arrow-alt-right"></i></button>
                    </div>
                  </form>
                </div>

              </div>
              <!--Form with header-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-7">

              <!--Google map-->
              <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px; border-radius: 10px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10929.808097813475!2d23.5941116!3d46.7756967!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd5a08ae7ed21e379!2sNTT%20DATA%20Romania!5e0!3m2!1sen!2sro!4v1596448170123!5m2!1sen!2sro" frameborder="0" style="border:0;" allowfullscreen></iframe>
              </div>

              <br>
              <!--Buttons-->
              <div class="row text-center">
                <div class="col-md-4">
                  <a style="padding:10px 15px; border-radius:50%;" class="btn btn-default"><i class="fas fa-map-marker-alt"></i></a>
                  <p>CJ 400158, Str. Constanta 19-21,</p>
                  <p>Romania</p>
                </div>

                <div class="col-md-4">
                  <a style="padding:12px 15px; border-radius:50%;" class="btn btn-default"><i class="fas fa-phone"></i></a>
                  <p>+ 01 234 567 89</p>
                  <p>Mon - Fri, 8:00-22:00</p>
                </div>

                <div class="col-md-4">
                  <a style="padding:12px 15px; border-radius:50%;" class="btn btn-default"><i class="fas fa-envelope"></i></a>
                  <p style="word-wrap:break-word;">info_emkran@gmail.com</p>
                  <p style="word-wrap:break-word;">sale_emkran@gmail.com</p>
                </div>
              </div>

            </div>
            <!--Grid column-->

          </div>

        </section>
        <!--Section: Contact v.1-->

      </div>
    </div>
  </div>
</div>

<!-- End - Modal - Contact -->

<!--Modal: Start-ConfirmDeleteCheckoutShcart-->
<div class="modal fade" id="modalConfirmDeleteCheckout" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteCheckout" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">Are you sure?</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a id="confirmDeleteCheckoutYes" type="button" class="btn  btn-outline-danger" data-dismiss="modal">Yes</a>
        <a id="confirmDeleteCheckoutNo" type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: End-ConfirmDeleteCheckoutShcart-->