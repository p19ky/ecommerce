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

    <div class="myTooltip">Hover over me
        <span class="myTooltiptext">Tooltip text</span>
    </div>

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



                                    <div class="row">
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4" id="genreSelectContainer">
                                            <h5>Select Genre(s):</h5>
                                            <select id="genreSelect" multiple="multiple">
                                                <option value="cheese">Fantasy</option>
                                                <option value="tomatoes">Sci-Fi</option>
                                                <option value="mozarella">Mystery</option>
                                                <option value="mushrooms">Romance</option>
                                                <option value="pepperoni">Dystopian</option>
                                                <option value="onions">Thriller</option>
                                                <option value="onions">Westerns</option>
                                                <option value="onions">Contemporary</option>
                                                <option value="onions">Adventure</option>
                                                <option value="onions">Horror</option>
                                                <option value="onions">Paranormal</option>
                                                <option value="onions">Health</option>
                                                <option value="onions">Motivational</option>
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
                    <button id="modalSearchButton" type="button" class="btn">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End-Modal -

</div>
@endsection