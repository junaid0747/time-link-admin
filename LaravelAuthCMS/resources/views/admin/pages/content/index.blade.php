@extends('admin.admin-master-template-with-datatable')
@section('content')
         <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <h4 class="mt-0 header-title d-flex" style="justify-content: space-between;">
                                            <span>
                                                Content 
                                            </span>
                                            <a href="{{route('content.create',0)}}" class="btn btn-primary">Add New</a>
                                        </h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                              
                                                <th>Book</th>                                                
                                                <th>Chapter</th>                                               
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                           @foreach($obj as $key => $val)
                                            <tr>
                                           
                                                <td>{{$val->book->name}}</td>
                                               <td>{{$val->chapter->chapter_name}}</td>
                                                <td>
                                                    <a class="p-1 m-1" href="{{route('content.create',$val->id)}}">
                                                    <i class="fa fa-edit"></i> 
                                                    </a>
                                                    <a class="p-1 m-1 delete_action" rel="{{$val->id}}" crud="content" href="javascript:void(0);">
                                                    <i class="fa fa-times"></i> 
                                                    </a>
                                                    <a class="p-1 m-1 view_details" rel="{{$val->id}}" crud="content" href="javascript:void(0);">
                                                    <i class="fa fa-eye"></i> 
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection