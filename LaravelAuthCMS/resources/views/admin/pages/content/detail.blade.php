<div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                         <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Book</label>
                                                    <h6>
                                                    <?=(isset($obj->book->name) && !empty($obj->book->name) ? $obj->book->name:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Chapters</label>
                                                    <h6>
                                                    <?=(isset($obj->chapter->chapter_name) && !empty($obj->chapter->chapter_name) ? $obj->chapter->chapter_name:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                       
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Content</label>
                                                    <h6>
                                                    <?=(isset($obj->content) && !empty($obj->content) ? $obj->content:'')?>
                                                    </h6>
                                                </div>
                                          </div>
                                       
                                         
                                         </div>
                                          
                                          
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                         
                        </div> <!-- end row -->  