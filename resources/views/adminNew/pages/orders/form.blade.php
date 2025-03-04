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
                            <h3>Add a new order Form</h3>
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
                                <h5>Order</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $update_id = 0;

                                if (isset($obj->id) && !empty($obj->id)) {
                                    $update_id = $obj->id;
                                }
                                ?>
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('orders.submit', $update_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom01">User Id</label>
                                            <input class="form-control" id="validationCustom01" name="user_id"
                                                type="text"
                                                value="<?= isset($obj->user_id) && !empty($obj->user_id) ? $obj->user_id : '' ?>"
                                                required placeholder=" User id">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="validationCustomUsername">Referrence id</label>
                                            <div class="input-group"><span class="input-group-text"
                                                    id="inputGroupPrepend">@</span>
                                                <input class="form-control" id="validationCustomUsername"
                                                    name="reference_id" type="text"
                                                    value="<?= isset($obj->reference_id) && !empty($obj->reference_id) ? $obj->reference_id : '' ?>"
                                                    placeholder="Reference Id" aria-describedby="inputGroupPrepend"
                                                    required>
                                            </div>
                                            <div class="invalid-feedback">Please enter a valid Reference id.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">Status</label>
                                            <input class="form-control" id="validationCustom02" name="status"
                                                type="text"
                                                value="<?= isset($obj->status) && !empty($obj->status) ? $obj->status : '' ?>"
                                                required placeholder="Status">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom03">Order date</label>
                                            <input class="form-control" id="validationCustom03" name="created_at"
                                                type="date"
                                                value="<?= isset($obj->created_at) && !empty($obj->created_at) ? $obj->created_at : '' ?>"
                                                placeholder="Order Date">
                                            <div class="invalid-feedback">Please provide a valid Order date.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom03">Delivered Date</label>
                                            <input class="form-control" id="validationCustom03" name="delivered_date"
                                                type="date"
                                                value="<?= isset($obj->delivered_date) && !empty($obj->delivered_date) ? $obj->delivered_date : '' ?>"
                                                placeholder="delivered_date">
                                            <div class="invalid-feedback">Please provide a valid delivered date.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom04">Awaited</label>
                                            <input class="form-control" id="validationCustom03" name="awaited_days"
                                                type="text"
                                                value="<?= isset($obj->awaited_days) && !empty($obj->awaited_days) ? $obj->awaited_days : '' ?>"
                                                placeholder="Awaited days">
                                            <div class="invalid-feedback">Please select a valid Awaited days.</div>
                                        </div>

                                    </div>
                                    <div class="row g-3">

                                        <div class="col-md-12">
                                            <label class="form-label" for="validationCustom04">Description</label>
                                            <input class="form-control" id="validationCustom03" name="order_description"
                                                type="text"
                                                value="<?= isset($obj->order_description) && !empty($obj->order_description) ? $obj->order_description : '' ?>"
                                                placeholder="Awaited days">
                                            <div class="invalid-feedback">Please enter valid order description.</div>
                                        </div>

                                    </div>
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
