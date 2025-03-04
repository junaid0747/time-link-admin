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
                    <h3>Orders Listing</h3>
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
                                        <th>User Name</th>
                                        <th>Referece Id</th>
                                        <th>Order Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obj as $key => $val)
                                        <tr>
                                            <td>{!! $val->users_list->user_name ?? ' ' !!}</td>
                                            <td>{{ $val->reference_id }}</td>
                                            <td>{{ $val->order_description }}</td>

                                            <td>
                                                <div class="d-flex">
                                                    <a class="p-1 m-1 view_details" rel="{{ $val->id }}" crud="order"
                                                        href="javascript:void(0);">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="p-1 m-1" href="{{ route('orders.create', $val->id) }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="p-1 m-1 delete_action" rel="{{ $val->id }}"
                                                        crud="order" href="javascript:void(0);">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Referece Id</th>
                                        <th>Order Description</th>
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
