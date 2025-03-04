<div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                         <div class="row">
                                      
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Url</label>
                                                    <h6>
                                                    <?=(isset($obj->url) && !empty($obj->url) ? $obj->url:'')?>
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