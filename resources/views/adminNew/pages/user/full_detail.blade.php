@extends('adminNew.admin-master-datatable')
@section('content')

    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>User Profile</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            @php $users = DB::table('users')->first(); @endphp
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-md-4 col-lg-4 col-xl-4 box-col-4">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid"
                                src="{{ asset('adminNew/assets/images/user-card/2.jpg') }}" alt=""></div>

                            {{-- <?php $image = isset($data->business_logo) && !empty($data->business_logo) ? $data->business_logo : ''; ?>
                            <img class="img-fluid  rounded-circle mb-3"
                                src="{{ asset('adminNew') }}/assets/images/appointment/app-ent.jpg" alt="Image description"> --}}
                                <div class="avatar-upload">
                                    <form id="edit_image_form">
                                        <div class="avatar-edit">
                                            <input type="hidden" name="user_id" value="{{$data->id}}">
                                            <?php $image = isset($data->image) && !empty($data->image) ? $data->image : ''; ?>
                                            <input type='file' name="image" id="imageUpload" data-default-file="{{<?= $data->image ?>}}"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url({!! $data->image !!});">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>{!! $data->name ?? '' !!} </h5>
                            <h6>Email :{!! $data->email ?? '' !!}</h6>
                            <h6>Contact :{!! $data->phone ?? '' !!}</h6>
                            <h6>Gender :{!! $data->gender ?? '' !!}</h6>
                            <h6>Age :{!! $data->age ?? '' !!}</h6>
                            <h6>Address :{!! $data->address ?? '' !!}</h6>
                        </div>
                        <div class="card-body dropdown-basic d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                @if ($data->status == 1)
                                    <button class="dropbtn btn-success" type="button">Active<span><i
                                                class="icofont icofont-arrow-down"></i></span></button>
                                @elseif ($data->status == 2)
                                    <button class="dropbtn btn-danger" type="button">Inactive<span><i
                                                class="icofont icofont-arrow-down"></i></span></button>
                                @elseif ($data->status == 3)
                                    <button class="dropbtn btn-warning" type="button">Pending<span><i
                                                class="icofont icofont-arrow-down"></i></span></button>
                                @elseif ($data->status == 4)
                                    <button class="dropbtn btn-primary" type="button">Pause<span><i
                                                class="icofont icofont-arrow-down"></i></span></button>
                                @else
                                    <button class="dropbtn btn-danger" type="button">Block<span><i
                                                class="icofont icofont-arrow-down"></i></span></button>
                                @endif

                                <div class="dropdown-content">
                                    <a
                                        href="{{ route('user.change.status', ['user_id' => $data->id, 'status' => 1]) }}">Active</a>
                                    <a
                                        href="{{ route('user.change.status', ['user_id' => $data->id, 'status' => 2]) }}">Inactive</a>
                                    <a
                                        href="{{ route('user.change.status', ['user_id' => $data->id, 'status' => 3]) }}">Pending</a>
                                    <a
                                        href="{{ route('user.change.status', ['user_id' => $data->id, 'status' => 4]) }}">Pause</a>
                                    <a
                                        href="{{ route('user.change.status', ['user_id' => $data->id, 'status' => 5]) }}">Block</a>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Linking code</h6>
                                <h5 class="counter">2578</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Status</h6>
                                <h5><span class="counter">Active</span></h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                {{-- @if (Cache::has('is_online' . $users->id))
                                    <span class="text-success">Online</span>
                                @else
                                    <span class="text-secondary">Offline</span>
                                @endif --}}
                                <h6>Last seen</h6>
                                <h5><span
                                        class="counter">{{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 ">

                            <a href=""
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Completed Orders</h6><span>{{ $countSuccessOrders }} </span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-4">

                            <a href=""
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body ">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Active orders</h6><span>{{ $countPendingOrders }} </span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">

                            <a href=""
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Stats</h6><span>100 </span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <div class="card m-5 p-3">
                                <div class="table-responsive m-5">
                                    <table class="display" id="advance-1">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>User Id</th>
                                                <th>Referrence id</th>
                                                <th>Status</th>
                                                <th>Order Date</th>
                                                <th>Delivered Date</th>
                                                <th>Awaited</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->orders as $order)
                                                <tr>
                                                    <td><a href="">{{ $order->id }}</a>
                                                    </td>
                                                    <td>{{ $order->user_id }}</td>
                                                    <td>{{ $order->referrence_id }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->delivered_date }}</td>
                                                    <td>{{ $order->awaited }}</td>
                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">
                                                                    <a class="p-1 m-1 view_details"
                                                                        rel="{{ $data->id }}" crud="business"
                                                                        href="javascript:void(0);">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
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

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4 ">

                            <a
                                href="{{ 'https://www.google.com/maps/search/?api=1&query=' . 28.41987 . ',' . 70.30345 }}">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">

                                            <h6><i class="fa fa-map"></i> </h6><span>Location</span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>

                        <div class="col-sm-4">

                            <a href=""
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6><i class="fa fa-dollar"></i> </h6><span>0 </span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>

                        <div class="col-sm-4">

                            <a href=""
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6><i class="fa fa-mobile"></i> </h6><span>Device name </span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xl-4 col-lg-4">
                <div class="row">

                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        <a href="">

                            <div class="card o-hidden static-top-widget-card ">
                                <div class="card-body p-2">
                                    <div class="media static-top-widget mb-2">
                                        <div class="media-body">
                                            <h6 class="font-roboto text-center">Notification</h6>
                                            <h4 class="mb-0 counter text-center">Send</h4>
                                        </div>

                                    </div>
                                    <div class="progress-widget">
                                        <div class="progress sm-progress-bar progress-animate">
                                            <div class="progress-gradient-secondary" role="progressbar"
                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"><span class="animate-circle"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-sm-6 col-xl-6 col-lg-6">
                        <a href="">

                            <div class="card o-hidden static-top-widget-card ">
                                <div class="card-body p-2">
                                    <div class="media static-top-widget mb-2">
                                        <div class="media-body">
                                            <h6 class="font-roboto  text-center">Email</h6>
                                            <h4 class="mb-0 counter  text-center">Send</h4>
                                        </div>

                                    </div>
                                    <div class="progress-widget">
                                        <div class="progress sm-progress-bar progress-animate">
                                            <div class="progress-gradient-success" role="progressbar" style="width: 60%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                                    class="animate-circle"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-sm-12 col-xl-12 col-lg-12">
                        <a href="">
                            <div class="card o-hidden static-top-widget-card ">
                                <div class="card-body p-2">
                                    <div class="media static-top-widget mb-2">
                                        <div class="media-body">
                                            <h6 class="font-roboto  text-center">Messages</h6>
                                            <h4 class="mb-0 counter  text-center">Send</h4>
                                        </div>

                                    </div>
                                    <div class="progress-widget">
                                        <div class="progress sm-progress-bar progress-animate">
                                            <div class="progress-gradient-primary" role="progressbar" style="width: 48%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                                    class="animate-circle"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
            <div class="col-sm-8 col-xl-8 col-lg-8">
                <div class="card custom-card p-0">
                    <div class="card-header"><img class="img-fluid"
                            src="" alt=""></div>
                    <div class=""><img class="rounded-circle"
                            src="" alt=""></div>

                    <div class="text-center profile-details">
                        <h5 class="text-danger">Subscription</h5>
                        <h6></h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-6 col-sm-6">
                            <h6>Cost</h6>
                            <h5 class="counter">$1000</h5>
                        </div>
                        <div class="col-6 col-sm-6">
                            <h6>Type</h6>
                            <h5><span class="counter">Monthly</span></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card">
                    <div class="card-header">
                        <h5>Menu Items/Ratings</h5><span>Add <code>.nav-primary</code> class with nav class</span>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="info-review-tab" data-bs-toggle="tab"
                                    href="#info-review" role="tab" aria-controls="info-review"
                                    aria-selected="true"><i class="icofont icofont-ui-home"></i>Reviews</a></li>

                            <li class="nav-item"><a class="nav-link" id="visited-restaurants-tab" data-bs-toggle="tab"
                                    href="#info-visited-restaurants" role="tab"
                                    aria-controls="info-visited-restaurants" aria-selected="false"><i
                                        class="icofont icofont-man-in-glasses"></i>Visited
                                    Restaurants</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="cart-items-tab" data-bs-toggle="tab"
                                    href="#info-cart-items" role="tab" aria-controls="info-cart-items"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Cart Items</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="purchase-history-tab" data-bs-toggle="tab"
                                    href="#info-purchase-history" role="tab" aria-controls="info-purchase-history"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Purchase
                                    History</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="referrals-tab" data-bs-toggle="tab"
                                    href="#info-referrals" role="tab" aria-controls="info-referrals"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Referral</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="info-tabContent">
                            <div class="tab-pane fade show active" id="info-review" role="tabpanel"
                                aria-labelledby="info-review-tab">

                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="basic-1">
                                            <thead>
                                                <tr>
                                                    <th>Business Name</th>
                                                    <th>Business Address</th>
                                                    <th>Business Onwer</th>
                                                    <th>Reviews</th>
                                                    <th>Business Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">

                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
                                                                        crud="user" href="javascript:void(0);">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="info-visited-restaurants" role="tabpanel"
                                aria-labelledby="visited-restaurants-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="basic-2">
                                            <thead>
                                                <tr>
                                                    <th>Restaurant Id</th>
                                                    <th>Restaurant name</th>
                                                    <th>Restaurant address</th>
                                                    <th>Status</th>
                                                    <th>Date</th>

                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">
                                                                    <a class="p-1 m-1 view_details" rel=""
                                                                        crud="business" href="javascript:void(0);">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
                                                                        crud="user" href="javascript:void(0);">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="info-cart-items" role="tabpanel"
                                aria-labelledby="cart-items-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="basic-3">
                                            <thead>
                                                <tr>
                                                    <th>Item Id</th>
                                                    <th>Item name</th>
                                                    <th>Item Quantity</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">
                                                                    <a class="p-1 m-1 view_details" rel=""
                                                                        crud="business" href="javascript:void(0);">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
                                                                        crud="user" href="javascript:void(0);">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="info-purchase-history" role="tabpanel"
                                aria-labelledby="purchase-history-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="basic-4">
                                            <thead>
                                                <tr>
                                                    <th>Purchase Id</th>
                                                    <th>Purchase Item</th>
                                                    <th>Purchase Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">
                                                                    <a class="p-1 m-1 view_details" rel=""
                                                                        crud="business" href="javascript:void(0);">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
                                                                        crud="user" href="javascript:void(0);">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="info-referrals" role="tabpanel"
                                aria-labelledby="referrals-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="basic-6">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Referral Id</th>
                                                    <th>name</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div class="dropdown-basic">
                                                            <div class="dropdown d-flex">
                                                                <span class="dropbtn">
                                                                    <i style="color: black" class="ri-more-2-fill"></i>
                                                                </span>
                                                                <div class="dropdown-content">
                                                                    <a class="p-1 m-1 view_details" rel=""
                                                                        crud="business" href="javascript:void(0);">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1" href="">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a class="p-1 m-1 delete_action" rel=""
                                                                        crud="user" href="javascript:void(0);">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6 xl-100">
                <div class="card">
                    <div class="card-header">
                        <h5>Demographic of Consumers </h5>
                    </div>
                    <div class="card-body">
                        <div id="basic-apex"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
            var formData = new FormData($("#edit_image_form")[0]);
            formData.append('image', $(this).val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/update/profileImage",
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 404) {
                        console.log(response.message);
                    } else {
                        console.log(response.message);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
