<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Name</label>
                            <h6>
                                <?= isset($obj->business_name) && !empty($obj->business_name) ? $obj->business_name : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Phone</label>
                            <h6>
                                <?= isset($obj->business_phone) && !empty($obj->business_phone) ? $obj->business_phone : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Category</label>
                            <h6>
                                <?= isset($obj->business_category) && !empty($obj->business_category) ? $obj->business_category : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Description</label>
                            <h6>
                                <?= isset($obj->business_description) && !empty($obj->business_description) ? $obj->business_description : '' ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Business Logo</label>
                            <div>
                                <?php $image = isset($obj->business_logo) && !empty($obj->business_logo) ? $obj->business_logo : ''; ?>

                                <img src="<?= $image ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div> <!-- end col -->


</div> <!-- end row -->
