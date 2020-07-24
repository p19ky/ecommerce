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

                                    <!-- Language -->
                                    <div class="md-form">
                                        <input type="text" id="languageInput" class="form-control advSearchInput">
                                        <label class="advSearchLabel" for="languageInput">Language</label>
                                    </div>

                                    <div class="md-form">
                                        <input data-placement="top" data-toggle="tooltip" title="press 'comma' or 'enter' to add tag!" type="text" id="tagsInput" class="main-input form-control advSearchInput">
                                        <label class="advSearchLabel" for="tagsInput">Tags</label>

                                        <br>

                                        <div id="divTagContainer" class="tags-input" data-name="tags-input">
                                            <!-- <span class="tag"><span class="tagTextSpan">HTML <i class="closeTagIcon fas fa-times"></i></span></span> -->
                                        </div>
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