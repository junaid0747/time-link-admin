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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Business Slogan</th>
                                        <th>Business Phone</th>
                                        <th>Business Category</th>
                                        <th>Business Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obj as $key => $val)
                                    <tr>
                                        

                                        <td>{{$val->business_name}}</td>
                                        <td>{{$val->business_slogen}}</td>
                                        <td>{{$val->business_phone}}</td>
                                        <td>{{$val->business_category}}</td>
                                        <td>{{$val->business_description}}</td>
                                        

                                        <td>
                                            <div class="d-flex">
                                                {{-- <a class="p-1 m-1" href="{{route('user.create',$val->id)}}">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="p-1 m-1 delete_action" rel="{{$val->id}}" crud="user" href="javascript:void(0);">
                                                    <i class="fa fa-times"></i>
                                                </a> --}}
                                                <a class="p-1 m-1 view_details" rel="{{$val->id}}" crud="vacancy" href="javascript:void(0);">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>

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