<div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                         <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Name</label>
                                                    <h6>
                                                    <?=(isset($obj->name) && !empty($obj->name) ? $obj->name:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Email</label>
                                                    <h6>
                                                    <?=(isset($obj->email) && !empty($obj->email) ? $obj->email:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Phone</label>
                                                    <h6>
                                                    <?=(isset($obj->phone) && !empty($obj->phone) ? $obj->phone:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Address</label>
                                                    <h6>
                                                    <?=(isset($obj->address) && !empty($obj->address) ? $obj->address:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                           <div class="form-group">
                                         
                                                <label>Image</label>
                                                <div>
                                                <?php $image = (isset($obj->image) && !empty($obj->image) ? $obj->image:''); ?>

                                                <img src="<?=$image?>" class="img-fluid" alt="">
                                                </div>                                              
                                            </div>
                                           </div>
                                         </div>
                                          
                                          
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                         
                        </div> <!-- end row -->  