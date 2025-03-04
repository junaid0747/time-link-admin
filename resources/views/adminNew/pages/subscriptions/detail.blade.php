<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subscription Type</label>
                            <h6>
                                <?= isset($obj->subscription_type) && !empty($obj->subscription_type) ? $obj->subscription_type : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Subscription Price</label>
                            <h6>
                                <?= isset($obj->price) && !empty($obj->price) ? $obj->price : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Start Date</label>
                            <h6>
                                <?= isset($obj->start_date) && !empty($obj->start_date) ? $obj->start_date : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>End Date</label>
                            <h6>
                                <?= isset($obj->end_date) && !empty($obj->end_date) ? $obj->end_date : '' ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->


</div> <!-- end row -->
