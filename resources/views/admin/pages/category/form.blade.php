@extends('admin.admin-master-template')
@section('content')
  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Categories</h4>
                                </div>
                               
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                       <?php 
                                        $update_id = 0;
                                       
                                        if(isset($obj->id) && !empty($obj->id)){
                                            $update_id = $obj->id;
                                        }
                                    ?>
                                        <form class="" action="{{route('category.submit',$update_id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="<?=(isset($obj->name) && !empty($obj->name) ? $obj->name:'')?>" class="form-control" required placeholder="Type something"/>
                                                </div>
                                          </div>
                                         
                                           <div class="col-md-6">
                                           <div class="form-group">
                                         
                                                <label>Image</label>
                                                <div>
                                                    <?php $image = (isset($obj->image) && !empty($obj->image) ? $obj->image:''); ?>
                                                <input name="image" data-default-file="<?=$image?>" type="file" class="dropify" data-height="100" />
                                                </div>
                                                
                                            </div>
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
        
                         
                        </div> <!-- end row -->      

                        
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

                <footer class="footer">
                    © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection