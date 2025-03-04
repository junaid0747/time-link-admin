<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Name</label>
                            <h6>
                                <?= isset($obj->users_list->user_name) && !empty($obj->users_list->user_name) ? $obj->users_list->user_name : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Order Description</label>
                            <h6>
                                <?= isset($obj->order_description) && !empty($obj->order_description) ? $obj->order_description : '' ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->


</div> <!-- end row -->
