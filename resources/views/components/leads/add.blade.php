<h5>Add Lead</h5>
<form id="add_lead_form" class="row g-3 requires-validation" novalidate method="post">
    @csrf

    <div class="col-md-12">
        <label for="fullname" class="form-label">Full Name:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
        <div class="valid-feedback">
        </div>
        <div class="invalid-feedback">
            @lang('forms.addlead.fullname.required')
        </div>
    </div>

    <div class="col-md-12">
        <label for="email" class="form-label">Email:</label>
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
        <button id="btn_addlead" class="btn btn-primary" type="submit"><i
                class="bi bi-plus-circle-fill me-1"></i><span>Add</span></button>
    </div>
</form>
