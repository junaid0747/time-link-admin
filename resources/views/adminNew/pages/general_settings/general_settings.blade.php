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
                            <h3>General Setting</h3>
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
                                <h5>Head Section Images</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $update_id = 0;

                                if (isset($obj->id) && !empty($obj->id)) {
                                    $update_id = $obj->id;
                                }
                                ?>
                                <form class="needs-validation" novalidate=""
                                    action="{{ route('general.setting.submit', $update_id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label class="form-label" for="validationCustom02">App Logo</label>
                                            <div>
                                                <?php $home_logo = isset($obj->home_logo) && !empty($obj->home_logo) ? $obj->home_logo : ''; ?>
                                                <input name="appLogo" id="validationCustom02"
                                                    data-default-file="<?= $home_logo ?>" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-5">
                                            <label class="form-label" for="validationCustom02">Dashboard Logo</label>
                                            <div>
                                                <?php $dashboard_logo = isset($obj->dashboard_logo) && !empty($obj->dashboard_logo) ? $obj->dashboard_logo : ''; ?>
                                                <input name="dashboardLogo" id="validationCustom02"
                                                    data-default-file="<?= $dashboard_logo ?>" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
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
