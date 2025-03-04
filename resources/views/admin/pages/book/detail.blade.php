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
                                                    <label>Description</label>
                                                    <h6>
                                                    <?=(isset($obj->description) && !empty($obj->description) ? $obj->description:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Categpry</label>
                                                    <h6>
                                                    <?=(isset($obj->category->name) && !empty($obj->category->name) ? $obj->category->name:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Language</label>
                                                    <h6>
                                                    <?=(isset($obj->language->name) && !empty($obj->language->name) ? $obj->language->name:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                         <div class="col-md-6">
                                             <label>Chapters</label>
                                             <?php if($chapter_data){ foreach ($chapter_data as $key =>$value) { ?>                                                
                                                <div class="form-group">
                                                   <h6>{{$value->chapter_name}}</h6>
                                                </div>
                                            <?php } }?>
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