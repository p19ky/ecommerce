@extends('layouts.main')
@section('content')

<div id="mainBody">

    <h1 style="color: #3061e2;display:flex; justify-content:center">Home page</h1>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <br><br>

    <!-- Modal -->

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

                                    <!-- Build your select: -->
                                    <!-- <select size="5" id="example-getting-started" multiple="multiple">
                                        <option value="cheese">Cheese</option>
                                        <option value="tomatoes">Tomatoes</option>
                                        <option value="mozarella">Mozzarella</option>
                                        <option value="mushrooms">Mushrooms</option>
                                        <option value="pepperoni">Pepperoni</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                        <option value="onions">Onions</option>
                                    </select> -->

                                </form>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button id="modalCancelButton" type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button id="modalSearchButton" type="button" class="btn">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End-Modal -

</div>
@endsection