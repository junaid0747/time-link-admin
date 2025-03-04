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
                            <h3>Add a New Subscription</h3>
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
                                <h5>Subscription</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $update_id = 0;

                                if (isset($obj->id) && !empty($obj->id)) {
                                    $update_id = $obj->id;
                                }
                                ?>
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('subscription.submit', $update_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom01">Subscription Type</label>
                                            <input class="form-control" id="validationCustom01" name="subscription_type"
                                                type="text"
                                                value="<?= isset($obj->subscription_type) && !empty($obj->subscription_type) ? $obj->subscription_type : '' ?>"
                                                required placeholder="Subscription Type">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Subscription Price</label>
                                            <input class="form-control" id="validationCustom02" name="price"
                                                type="number"
                                                value="<?= isset($obj->price) && !empty($obj->price) ? $obj->price : '' ?>"
                                                required placeholder="Price">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom03">Start Date</label>
                                            <input class="form-control" id="validationCustom03" name="start_date"
                                                type="date"
                                                value="<?= isset($obj->start_date) && !empty($obj->start_date) ? $obj->start_date : '' ?>">
                                            <div class="invalid-feedback">Please provide a valid Country.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="validationCustom03">End Date</label>
                                            <input class="form-control" id="validationCustom03" name="end_date"
                                                type="date"
                                                value="<?= isset($obj->end_date) && !empty($obj->end_date) ? $obj->end_date : '' ?>">
                                            <div class="invalid-feedback">Please provide a valid city.</div>
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
