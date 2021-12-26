@extends('app.layout')
@section('content')
    <div class="mb-3"></div>
    <h1>Welcome to Leads Manager !</h1>
    <p class="fst-italic text-black-50">Made by Med Reda Kamal</p>
    <hr />
    <div class="row">
        <div class="col-12 col-md-3">
            <x-leads.add />
        </div>
        <div class="col-12 col-md-9">
            <x-leads.list />
        </div>

        <!-- Modal : Edit Lead -->
        <div id="editLeadModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <form action="" id="update_lead_form" class="row g-3 requires-validation" novalidate method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="d-none" name="id" value="">
                            <div class="col-md-12">
                                <label for="fullname" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Fullname is required!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="email²" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Email is required!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="phonenumber" class="form-label">Phone number:</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Phone number is required!
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="location" class="form-label">Location:</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                                <div class="valid-feedback">
                                </div>
                                <div class="invalid-feedback">
                                    Location is required!
                                </div>
                            </div>


                            <div class="col-12">
                                <button id="btn_updatelead" class="btn btn-success" type="button">Update</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

        <x-ajax />

    </div>
@endsection
