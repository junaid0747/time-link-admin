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
                                    <h4 class="page-title">Content</h4>
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
                                       
                                       
                                        if(isset($obj->id) && !empty($obj->id)){
                                            $update_id = $obj->id;
                                            
                                        }
                                    ?>
                                        <form class="validate_form" action="{{route('content.submit',$update_id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Book</label>                                                    
                                                    <select name="book_id" id="book" class="form-control" required> 
                                                        <option >Select Book</option>
                                                        @foreach ($book_list as $key =>$value )
                                                            <option value="{{$value->id}}" {{ isset($obj->book_id) ? ($obj->book_id==$value->id ? 'selected' : '') : '';}}>{{$value->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Chapter</label>                                                    
                                                    <select name="chapter_id" id="chapter" class="form-control" required> 
                                                        <option >Select Book</option>
                                                        @foreach ($chapter_list as $key =>$value )
                                                            <option value="{{$value->id}}" {{ isset($obj->chapter_id) ? ($obj->chapter_id==$value->id ? 'selected' : '') : '';}}>{{$value->chapter_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                    <label>Content</label>
                                                    <textarea name="content" class="summernote terms_and_condition">{!! $obj->content ?? '' !!}</textarea>
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

           
<script type="text/javascript">

    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['fontname', ['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['fullscreen', 'codeview']],
            ],
            callbacks: {
            onChange: function(contents, $editable) {
                $(window).unbind('beforeunload');
                $(window).bind('beforeunload', function(){
                    return 'Are you sure you want to leave?';
                });
            }
            }
        });
    });
    var edit = function () {
        $('.click2edit').summernote({focus: true});
    };
    var save = function () {
        var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
        $('.click2edit').destroy();
    };
    $(document).on('submit', '.validate_form', function () {
        $('.error').html('');
        $('.success_msg').html('');
        $('#msg').html('');
        var valid = true;
        var in_tc = $('.terms_and_condition').summernote('code');
        if(!in_tc){
            valid=false;
        }
        if (valid == true) {
           
        } else {
            $('.error').html('Content can not be empty')
            return false;
        }

    });

    $('#book').on('change',function(){
       
        var book_id = $(this).val();
        if($(this).val()!=0){
            $.ajax({
            url: "{{route('content.chapters')}}",
            cache: false,
            type:"get",
            dataType:"json",
            data:{
                book_id : book_id,
            },
            success: function(data){
             var list = data.data;
              if(list){
                  var html = '<option></option>';
                $.each(list,function(i,v){
                    console.log(v)
                    html+= '<option value="'+v.id+'">'+v.chapter_name+'</option>';
                });
                $('#chapter').html(html);
              }
            }
            });
        }
     

    })
   
</script>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection