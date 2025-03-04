    <?php 
    
    use DB;
    ?>
    <div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
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
                            <label>Business Slogan <Title></Title></label>
                            <h6>
                                <?= (isset($obj->business_slogen) && !empty($obj->business_slogen) ? $obj->business_slogen : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Phone</label>
                            <h6>
                                <?= (isset($obj->business_phone) && !empty($obj->business_phone) ? $obj->business_phone : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Category</label>
                            <h6>
                                <?= (isset($obj->business_category) && !empty($obj->business_category) ? $obj->business_category : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Description</label>
                            <h6>
                                <?= (isset($obj->business_description) && !empty($obj->business_description) ? $obj->business_description : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Price</label>
                            <h6>
                                <?= (isset($obj->business_price) && !empty($obj->business_price) ? $obj->business_price : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Pirce Range</label>
                            <h6>
                                <?= (isset($obj->business_price_ranage) && !empty($obj->business_price_ranage) ? $obj->business_price_ranage : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Price Description</label>
                            <h6>
                                <?= (isset($obj->business_price_description) && !empty($obj->business_price_description) ? $obj->business_price_description : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Location</label>
                            <h6>
                                <?= (isset($obj->business_location) && !empty($obj->business_location) ? $obj->business_location : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Social Media Links</label>
                            <h6>
                                <?= (isset($obj->social_media_links) && !empty($obj->social_media_links) ? $obj->social_media_links : '') ?>
                            </h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Website URL</label>
                            <h6>
                                <?= (isset($obj->website_url) && !empty($obj->website_url) ? $obj->website_url : '') ?>
                            </h6>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Payment Plan</label>
                            <h6>
                                <?= (isset($obj->payment_plan) && !empty($obj->payment_plan) ? $obj->payment_plan : '') ?>
                            </h6>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Logo</label>
                            <img src="<?= (isset($obj->business_logo) && !empty($obj->business_logo) ? $obj->business_logo : '') ?>" class="img-fluid" alt="Business App Logo Not Found"/>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Cover</label>
                            
                             <img src="<?= (isset($obj->business_cover) && !empty($obj->business_cover) ? $obj->business_cover : '') ?>" class="img-fluid" alt="Business Cover Image Not Found"/>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Business Images</h1>
                    </div>
                    <?php 
                   $businessImages = DB::table('images')->whereBusiness_id((isset($obj->id) && !empty($obj->id) ? $obj->id : ''))->get();
                   foreach($businessImages as $key => $val){
                       ?>
                          <div class="col-md-6">
                        <div class="form-group">
                            <label>Business Cover</label>
                            
                             <img src="<?= asset('uploads/business').'/'.(isset($val->image) && !empty($val->image) ? $val->image : '') ?>" class="img-fluid" alt="Business Image"/>
                        </div>
                    </div>
                       
                    <?php }
                   ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->