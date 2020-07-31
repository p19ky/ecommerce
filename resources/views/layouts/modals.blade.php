<!-- Start-FeedbackModal -->

<div class="modal fade right" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="FeedbackModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">
    <div id="feedbackModalContent" class="modal-content">
      <!--Header-->
      <div id="feedbackModalHeader" class="modal-header">
        <p class="heading lead">Feedback request
        </p>

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
        <h5 class="modal-title" id="modalHeaderTitle">Advanced Search</h5>
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
                    <!-- These Comments are for test purpose, don't delete. -->
                  </div>
                </div>



                <div class="row">
                  <div class="col-4">
                  </div>
                  <div class="col-4" id="genreSelectContainer">
                    <h5>Select Genre(s):</h5>
                    <select id="genreSelect" multiple="multiple">
                      <option value="Fantasy">Fantasy</option>
                      <option value="Sci-Fi">Sci-Fi</option>
                      <option value="Mystery">Mystery</option>
                      <option value="Romance">Romance</option>
                      <option value="Dystopian">Dystopian</option>
                      <option value="Thriller">Thriller</option>
                      <option value="Westerns">Westerns</option>
                      <option value="Contemporary">Contemporary</option>
                      <option value="Adventure">Adventure</option>
                      <option value="Horror">Horror</option>
                      <option value="Paranormal">Paranormal</option>
                      <option value="Health">Health</option>
                      <option value="Motivational">Motivational</option>
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

<!--Modal: Start-modalConfirmDeleteByRemQuan-->
<div class="modal fade" id="modalConfirmDeleteByRemQuan" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteByRemQuanLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <div class="row">
          <div class="col-12">
            <p class="heading">This Book's Quantity is 0 now.</p>
          </div>
          <div class="col-12">
            <p class="heading">Do you want to remove it?</p>
          </div>
        </div>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fas fa-times fa-4x animated rotateIn"></i>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a id="confirmDeleteShcartElementByRemQuanYes" class="btn  btn-outline-danger" data-dismiss="modal">Yes</a>
        <a id="confirmDeleteShcartElementByRemQuanNo" type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: End-modalConfirmDeleteByRemQuan-->

<!-- Modal: Start-modalWishlist -->
<div class="modal fade" id="modalWishlist" tabindex="-1" role="dialog" aria-labelledby="modalWishlistLabel" aria-hidden="true">
  <div id="modalWishlistDialog" class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div id="modalWishlistContent" class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 id="wishlistHeaderTitle" class="modal-title" id="myModalLabel">Your Wishlist</h4>
        <button id="wishlistHeaderClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div id="wishlistModalBody" class="modal-body">

        <table class="text-white table">
          <thead class="text-center">
            <tr>
              <th>#</th>
              <th>Book</th>
              <th>Price</th>
              <th>Add to Cart</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody id="wishlistItemList" class="text-center">
            <tr class="wishlistItem">
              <th scope="row">1</th>
              <td>Book 1</td>
              <td>11,99$</td>
              <td><button type="button" class="btn wishlistAddToCartButton btn-sm">Add to Cart</button></td>
              <td><a><i class="removeItemWishlistClass fas fa-times"></i></a></td>
            </tr>
            <tr class="wishlistItem">
              <th scope="row">2</th>
              <td>Book 2</td>
              <td>20,00$</td>
              <td><button type="button" class="btn wishlistAddToCartButton btn-sm">Add to Cart</button></td>
              <td><a><i class="removeItemWishlistClass fas fa-times"></i></a></td>
            </tr>
            <tr class="wishlistItem">
              <th scope="row">3</th>
              <td>Book 3</td>
              <td>15,49$</td>
              <td><button type="button" class="btn wishlistAddToCartButton btn-sm">Add to Cart</button></td>
              <td><a><i class="removeItemWishlistClass fas fa-times"></i></a></td>
            </tr>
            <tr class="wishlistItem">
              <th scope="row">4</th>
              <td>Book 4</td>
              <td>17,49$</td>
              <td><button type="button" class="btn wishlistAddToCartButton btn-sm">Add to Cart</button></td>
              <td><a><i class="removeItemWishlistClass fas fa-times"></i></a></td>
            </tr>
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="d-flex justify-content-md-between modal-footer">
        <button id="closeModalWishlistButton" type="button" class="btn" data-dismiss="modal">Close</button>
        <button id="addAllModalWishlistButton" type="button" class="btn" data-dismiss="modal">Add all to Cart</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal: End-modalWishlist -->