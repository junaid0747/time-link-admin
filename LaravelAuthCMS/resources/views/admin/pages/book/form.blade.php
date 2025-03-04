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
                                    <h4 class="page-title">Books</h4>
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
                                        $count_field = 1;
                                        $chapters = [];
                                       
                                        if(isset($obj->id) && !empty($obj->id)){
                                            $update_id = $obj->id;
                                            $chapters = $chapter_data;
                                            if(count($chapters) >0)
                                            $count_field = 0 ;
                                        }
                                    ?>
                                        <form class="" action="{{route('book.submit',$update_id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="<?=(isset($obj->name) && !empty($obj->name) ? $obj->name:'')?>" class="form-control" required placeholder="Type something"/>
                                                </div>
                                          </div>
                                         
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control" required><?=(isset($obj->description) && !empty($obj->description) ? $obj->description:'')?></textarea>
                                                    
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Category</label>                                                    
                                                    <select name="category_id"  class="form-control" required> 
                                                        <option >Select Category</option>
                                                        @foreach ($category_list as $key =>$value )
                                                            <option value="{{$value->id}}" {{ isset($obj->category_id) ? ($obj->category_id==$value->id ? 'selected' : '') : '';}}>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Language</label>                                                    
                                                    <select name="language_id"  class="form-control" required> 
                                                        <option >Select Language</option>
                                                        @foreach ($language_list as $key =>$value )
                                                            <option value="{{$value->id}}" {{ isset($obj->language_id) ? ($obj->language_id==$value->id ? 'selected' : '') : '';}}>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6" id="chapter_div">
                                              <label>Chapters</label>
                                              <a href="javascript:void();" class="add_field_chapters"><i class="fa fa-plus "></i></a>
                                              <?php for ($a=0;$a<$count_field;$a++) { ?>                                                
                                                <div class="form-group">
                                                    <input type="text" name="chapters[]" class="ch_"/> <a href="javascript:void();" class="remove_field_chapters"><i class="fa fa-trash" ></i></a>
                                                </div>
                                            <?php }?>
                                              <?php if($chapters){ foreach ($chapters as $key =>$value) { ?>                                                
                                                <div class="form-group">
                                                    <input type="text" name="chapters[]" value="{{$value->chapter_name}}"class="ch_"/> <a href="javascript:void();" class="remove_field_chapters"><i class="fa fa-trash" ></i></a>
                                                </div>
                                            <?php } }?>
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

            <script>
                $('body').on('click','.remove_field_chapters',function(){
                   if($('.remove_field_chapters').length==1){
                       alert('can not delete last field');
                   }else{
                       $(this).closest('.form-group').remove();
                       alert();
                   }
                });
                $('body').on('click','.add_field_chapters',function(){
                  $('#chapter_div').append('<div class="form-group">\
                                                    <input type="text" name="chapters[]" class="ch_"/> <a href="javascript:void();" class="remove_field_chapters"><i class="fa fa-trash" ></i></a>\
                                                </div>');
                });

            </script>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection