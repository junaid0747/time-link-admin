@extends('adminNew.admin-master-template')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h3>Add a new User Form</h3>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Starts here --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>User</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $update_id = 0;

                                if (isset($obj->id) && !empty($obj->id)) {
                                    $update_id = $obj->id;
                                }
                                ?>
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('user.submit.new', $update_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom01">Name</label>
                                            <input class="form-control" id="validationCustom01" name="name"
                                                type="text"
                                                value="<?= isset($obj->name) && !empty($obj->name) ? $obj->name : '' ?>"
                                                required placeholder="Full Name">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustomUsername">Email</label>
                                            <div class="input-group"><span class="input-group-text"
                                                    id="inputGroupPrepend">@</span>
                                                <input class="form-control" id="validationCustomUsername" name="email"
                                                    type="text"
                                                    value="<?= isset($obj->email) && !empty($obj->email) ? $obj->email : '' ?>"
                                                    placeholder="Email" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                            <div class="invalid-feedback">Please choose an email.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Phone</label>
                                            <input class="form-control" id="validationCustom02" name="phone"
                                                type="number"
                                                value="<?= isset($obj->phone) && !empty($obj->phone) ? $obj->phone : '' ?>"
                                                required placeholder="Phone Number">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom03">Country</label>
                                            <input class="form-control" id="validationCustom03" name="country"
                                                type="text"
                                                value="<?= isset($obj->country) && !empty($obj->country) ? $obj->country : '' ?>"
                                                placeholder="Country">
                                            <div class="invalid-feedback">Please provide a valid Country.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom03">City</label>
                                            <input class="form-control" id="validationCustom03" name="city"
                                                type="text"
                                                value="<?= isset($obj->city) && !empty($obj->city) ? $obj->city : '' ?>"
                                                placeholder="City">
                                            <div class="invalid-feedback">Please provide a valid city.</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="validationCustom04">State</label>
                                            <input class="form-control" id="validationCustom03" name="state"
                                                type="text"
                                                value="<?= isset($obj->state) && !empty($obj->state) ? $obj->state : '' ?>"
                                                placeholder="State">
                                            <div class="invalid-feedback">Please select a valid state.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom04">Location</label>
                                            <input class="form-control" id="validationCustom03" name="location"
                                                type="text"
                                                value="<?= isset($obj->location) && !empty($obj->location) ? $obj->location : '' ?>"
                                                placeholder="Location">
                                            <div class="invalid-feedback">Please select a valid Location.</div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom01">Address</label>
                                            <input class="form-control" id="validationCustom01" name="address"
                                                type="text"
                                                value="<?= isset($obj->address) && !empty($obj->address) ? $obj->address : '' ?>"
                                                required placeholder="Address">
                                            <div class="valid-feedback">Please give your complete address</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustomUsername">Password</label>
                                            <input class="form-control" id="validationCustomUsername" name="password"
                                                type="text"
                                                value="<?= isset($obj->password) && !empty($obj->password) ? $obj->password : '' ?>"
                                                placeholder="Password" aria-describedby="inputGroupPrepend" required>
                                            <div class="invalid-feedback">Please set a good password.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom02">Image</label>
                                            <div>
                                                <?php $image = isset($obj->image) && !empty($obj->image) ? $obj->image : ''; ?>
                                                <input name="image" data-default-file="<?= $image ?>" type="file"
                                                    class="dropify" data-height="100" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <div class="checkbox p-0">
                                                <input class="form-check-input" id="invalidCheck" type="checkbox"
                                                    required>
                                                <label class="form-check-label" for="invalidCheck">Agree to terms and
                                                    conditions</label>
                                            </div>
                                            <div class="invalid-feedback">You must agree before submitting.</div>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div> <!-- end row -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection
