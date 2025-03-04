@extends('adminNew.admin-master-datatable')

@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    {{-- <div class="content-page">
        <!-- Start content -->
        <div class="content"> --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Products Listing</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Product Picture</th>
                                        <th>Product Name</th>
                                        <th>Business Name</th>
                                        <th>Product Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obj as $key => $val)
                                        <tr>
                                            <td><img src="<?= $val->image ?>" height="50" width="50"
                                                class="img-fluid img-thumbnail" alt=""></td>
                                            <td>{{ $val->name }}</td>
                                            <td>{!! $val->business_list->business_name ?? " " !!}</td>
                                            <td>{{ $val->price}}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a class="p-1 m-1 view_details" rel="{{ $val->id }}" crud="product"
                                                        href="javascript:void(0);">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="p-1 m-1" href="{{ route('user.create.new', $val->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="p-1 m-1 delete_action" rel="{{ $val->id }}"
                                                        crud="user" href="javascript:void(0);">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Product Picture</th>
                                        <th>Product Name</th>
                                        <th>Business Name</th>
                                        <th>Product Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DOM / jQuery  Ends-->
        </div>
    </div>
    <!-- container-fluid -->
    {{-- </div>
        <!-- content -->
    </div> --}}
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection
{{-- @include('admin.layout.footer')
@include('admin.assets.script') --}}
