@extends('adminNew.admin-master-datatable')
<?php
// dd($obj)
?>
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
                    <h3>Business Listing</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>Business Onwer</th>
                                        <th>Business Key</th>
                                        <th>NFC Link</th>
                                        <th>ASIC_approved</th>
                                        <th>ACN_approved</th>
                                        <th>ABN_approved</th>
                                        <th>Business Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obj as $val)
                                        <tr>
                                            <td><a
                                                    href="{{ route('business.full.details', $val->id) }}">{{ $val->business_name }}</a>
                                            </td>
                                            <td>{!! $val->address ?? ' ' !!}</td>
                                            <td>{!! $val->user_list->name ?? ' ' !!}</td>
                                            <td>{!! $val->business_key ?? ' ' !!}</td>
                                            <td onclick="copyToClipboard('{!! 'https://timelink-user-app.vercel.app/' . $val->business_key ?? ' ' !!}')"
                                                style="cursor: pointer;">
                                                {!! 'https://timelink-user-app.vercel.app/' . $val->business_key ?? ' ' !!}
                                            </td>

                                            <td>{!! $val->user_list->ASIC_approved ?? ' ' !!}</td>
                                            <td>{!! $val->user_list->ACN_approved ?? ' ' !!}</td>
                                            <td>{!! $val->user_list->ABN_approved ?? ' ' !!}</td>
                                            <td>{{ $val->status == 1 ? 'Active' : 'In Active' }}</td>
                                            <td>
                                                <div class="dropdown-basic">
                                                    <div class="dropdown d-flex">
                                                        <span class="dropbtn">
                                                            <i style="color: black" class="ri-more-2-fill"></i>
                                                        </span>
                                                        <div class="dropdown-content">
                                                            <a class="p-1 m-1 view_details" rel="{{ $val->id }}"
                                                                crud="business" href="javascript:void(0);">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a class="p-1 m-1"
                                                                href="{{ route('user.create.new', $val->id) }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="p-1 m-1 delete_action" rel="{{ $val->id }}"
                                                                crud="user" href="javascript:void(0);">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>Business Onwer</th>
                                        <th>ASIC_approved</th>
                                        <th>ACN_approved</th>
                                        <th>ABN_approved</th>
                                        <th>Business Status</th>
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
    <script>
        function copyToClipboard(link) {
            var tempInput = document.createElement('input');
            tempInput.setAttribute('value', link);
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Optionally, provide feedback to the user
            alert('Link copied to clipboard!');
        }
    </script>
@endsection
{{-- @include('admin.layout.footer')
@include('admin.assets.script') --}}
