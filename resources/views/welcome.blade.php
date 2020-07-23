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
        <div id="advancedSearchModalDialog" class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                            <div class="col-12">
                                <form class="adaptiveInput">
                                    <input type="text" required><label placeholder="Title" alt="Title"></label>
                                </form>
                            </div>
                            <div class="col-12">
                                Second Column
                            </div>
                            <div class="col-12">
                                Third Column
                            </div>
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