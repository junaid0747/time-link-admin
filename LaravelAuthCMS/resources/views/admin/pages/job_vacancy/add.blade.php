@extends('admin.admin-master-template-with-datatable')
@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content m-t-30">
        <div class="container-fluid ">
            <div class="row" style="margin-top:200px !important;">
                <div class="offset-lg-3 col-lg-6 ">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title text-center">Add a Job Vacancy</h4>


                            <form class="" action="#" novalidate="">
                                <div class="form-group">
                                    <label>Posteb By</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>
                                <div class="form-group">
                                    <label>Bussiness Name</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <label>Job Description</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div><div class="form-group">
                                    <label>Salary Type</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <label>Minimum Salary</label>
                                    <input type="number" class="form-control" required="" placeholder="Type something">
                                </div>
                                <div class="form-group">
                                    <label>Maximum Salary</label>
                                    <input type="number" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <label>Receive Application By Email</label>
                                    <select name="receive_application_by_email" class="form-control" id="">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Work location</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" required="" placeholder="Type something">
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>
</div>
@endsection