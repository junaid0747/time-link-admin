@extends('adminNew.admin-master-datatable')
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Business Profile</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">

            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-md-4 col-lg-4 col-xl-4 box-col-4">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid"
                                src="{{ asset('adminNew/assets/images/user-card/2.jpg') }}" alt=""></div>
                        <div class="card-profile">
                            <?php $image = isset($data->business_logo) && !empty($data->business_logo) ? $data->business_logo : ''; ?>
                            <img class="img-fluid  rounded-circle mb-3"
                                src="{{ asset('adminNew') }}/assets/images/appointment/app-ent.jpg" alt="Image description">
                        </div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>{!! $data->business_name ?? '' !!} </h5>
                            <h6>Contact :{!! $data->business_phone ?? '' !!}</h6>
                            <h6>Email :{!! $data->email ?? '' !!}</h6>
                            <h6>Business address :{!! $data->business_address ?? '' !!}</h6>
                            <h6>Business Hours :{!! $data->business_hours ?? '' !!}</h6>
                        </div>
                        <div class="card-body dropdown-basic d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="dropbtn btn-danger" type="button">Inactive<span><i
                                            class="icofont icofont-arrow-down"></i></span></button>
                                <div class="dropdown-content">
                                    <a href="#">Active</a>
                                    <a href="#">Inactive</a>
                                    <a href="#">Pending</a>
                                    <a href="#">Pause</a>
                                    <a href="#">Block</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Unique code</h6>
                                <h5 class="counter">2578</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Status</h6>
                                <h5><span class="counter">Paid</span></h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Total Users</h6>
                                <h5><span class="counter">0</span></h5>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 ">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'current-orders']) }}"
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Current Orders</h6><span>100 </span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-4">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'past-orders']) }}"
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body ">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Past orders</h6><span>100 </span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'persons-visited']) }}"
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6>Visited persons</h6><span>100 </span>
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
                                                <th>Business Name</th>
                                                <th>Business Address</th>
                                                <th>Business Onwer</th>
                                                <th>ASIC_approved</th>
                                                <th>ACN_approved</th>
                                                <th>ABN_approved</th>
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
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="dropdown-basic">
                                                        <div class="dropdown d-flex">
                                                            <span class="dropbtn">
                                                                <i style="color: black" class="ri-more-2-fill"></i>
                                                            </span>
                                                            <div class="dropdown-content">
                                                                <a class="p-1 m-1 view_details" rel="{{ $data->id }}"
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
                    <div class="row mt-5">
                        <div class="col-sm-3 ">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'current-orders']) }}"
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body">
                                        <div class="right-chart-content text-center m-3">
                                            <h6><i class="fa fa-map"></i> </h6><span>Location</span>
                                        </div>
                                    </div>

                                </div>
                            </a>

                        </div>
                        <div class="col-sm-3">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'past-orders']) }}"
                                class="active">
                                <div class="card m-5 shadowBox">

                                    <div class="media-body ">
                                        <div class="right-chart-content text-center m-3">
                                            <h6><i class="fa fa-clock-o"></i></h6><span>0 Hours</span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'persons-visited']) }}"
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

                        <div class="col-sm-3">

                            <a href="{{ route('business.full.details', ['business_id' => $data->id, 'id' => 'persons-visited']) }}"
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
                    <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/2.jpg"
                            alt=""></div>
                    <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/16.jpg"
                            alt=""></div>

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
                            <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab"
                                    href="#info-home" role="tab" aria-controls="info-home" aria-selected="true"><i
                                        class="icofont icofont-ui-home"></i>Menu</a></li>
                            <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab"
                                    href="#info-profile" role="tab" aria-controls="info-profile"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Rating</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="active-order-tab" data-bs-toggle="tab"
                                    href="#info-active" role="tab" aria-controls="info-active"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Active
                                    orders</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="completed-order-tab" data-bs-toggle="tab"
                                    href="#info-completed" role="tab" aria-controls="info-completed"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Completed
                                    orders</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="offers-tab" data-bs-toggle="tab"
                                    href="#info-offers" role="tab" aria-controls="info-offers"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Offers</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="referrals-tab" data-bs-toggle="tab"
                                    href="#info-referrals" role="tab" aria-controls="info-referrals"
                                    aria-selected="false"><i class="icofont icofont-man-in-glasses"></i>Referral</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="info-tabContent">
                            <div class="tab-pane fade show active" id="info-home" role="tabpanel"
                                aria-labelledby="info-home-tab">

                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="advance-2">
                                            <thead>
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
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
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
                            <div class="tab-pane fade" id="info-profile" role="tabpanel"
                                aria-labelledby="profile-info-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="business-detail-2">
                                            <thead>
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
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><a href=""></a>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
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

                            <div class="tab-pane fade" id="info-active" role="tabpanel"
                                aria-labelledby="active-order-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="business-detail-3">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Product name</th>
                                                    <th>Receiver name</th>
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

                            <div class="tab-pane fade" id="info-completed" role="tabpanel"
                                aria-labelledby="completed-order-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="business-detail-4">
                                            <thead>
                                                <tr>
                                                    <th>Order Id</th>
                                                    <th>Product name</th>
                                                    <th>Receiver name</th>
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

                            <div class="tab-pane fade" id="info-offers" role="tabpanel" aria-labelledby="offers-tab">
                                <div class="card m-5 p-3">
                                    <div class="table-responsive m-5">
                                        <table class="display" id="business-detail-5">
                                            <thead>
                                                <tr>
                                                    <th>Offer Id</th>
                                                    <th>Offer name</th>
                                                    <th>Offer duration</th>
                                                    <th>Offer quantity</th>
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
                                        <table class="display" id="business-detail-6">
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
                        <h5>Demographic Chart of Users</h5>
                    </div>
                    <div class="card-body chart-block">
                        <div class="flot-chart-container">
                            <div class="flot-chart-placeholder" id="flot-categories"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
