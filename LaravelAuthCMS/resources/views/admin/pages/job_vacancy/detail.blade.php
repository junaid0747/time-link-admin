<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Posted By</label>
                            <h6>
                                <?= (isset($obj->posted_by) && !empty($obj->posted_by) ? $obj->posted_by : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job <Title></Title></label>
                            <h6>
                                <?= (isset($obj->job_title) && !empty($obj->job_title) ? $obj->job_title : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Name</label>
                            <h6>
                                <?= (isset($obj->business_name) && !empty($obj->business_name) ? $obj->business_name : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Description</label>
                            <h6>
                                <?= (isset($obj->job_description) && !empty($obj->job_description) ? $obj->job_description : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Salary Type</label>
                            <h6>
                                <?= (isset($obj->salary_type) && !empty($obj->salary_type) ? $obj->salary_type : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Minimum Salary</label>
                            <h6>
                                <?= (isset($obj->minimum_salary) && !empty($obj->minimum_salary) ? $obj->minimum_salary : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Maximum Salary</label>
                            <h6>
                                <?= (isset($obj->maximum_salary) && !empty($obj->maximum_salary) ? $obj->maximum_salary : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Receive Application By Email</label>
                            <h6>
                                <?= (isset($obj->receive_application_by_email) && !empty($obj->receive_application_by_email) ? $obj->receive_application_by_email : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Work Location</label>
                            <!--<h6>-->
                            <!--    <?= (isset($obj->work_location) && !empty($obj->work_location) ? $obj->work_location : '') ?>-->
                            <!--</h6>-->
                            <h6>---</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->