<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title', "DASHBOARD")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('storage') }}/{{ getOptionData('favicon') }}">
    @yield('css')
    <!-- App css -->
    <link href="{{ asset('admin') }}/libs/sweetalert3/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/libs/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css" >

{{--    Tynimc--}}
    <script src="{{ asset('admin') }}/js/tynimc.js" referrerpolicy="origin"></script>
{{--    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>--}}
    {{-- toastr --}}
    <link rel="stylesheet" href="{{asset('admin')}}/css/toastr.min.css">


    <style>
        table tr th,
        table tr td{
            vertical-align: middle !important;
        }
        .tox-notifications-container, svg{
            display: none;
        }
    </style>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">




{{--            <li class="dropdown notification-list">--}}
{{--                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">--}}
{{--                    <i class="fe-bell noti-icon"></i>--}}
{{--                    <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right dropdown-lg">--}}

{{--                    <!-- item-->--}}
{{--                    <div class="dropdown-item noti-title">--}}
{{--                        <h5 class="m-0">--}}
{{--                                    <span class="float-right">--}}
{{--                                        <a href="" class="text-dark">--}}
{{--                                            <small>Clear All</small>--}}
{{--                                        </a>--}}
{{--                                    </span>Notification--}}
{{--                        </h5>--}}
{{--                    </div>--}}

{{--                    <div class="slimscroll noti-scroll">--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>--}}
{{--                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>--}}
{{--                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>--}}
{{--                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>--}}
{{--                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>--}}
{{--                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <div class="notify-icon bg-primary"><i class="mdi mdi-heart"></i></div>--}}
{{--                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>--}}
{{--                        </a>--}}

{{--                    </div>--}}

{{--                    <!-- All-->--}}
{{--                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">--}}
{{--                        View all--}}
{{--                        <i class="fi-arrow-right"></i>--}}
{{--                    </a>--}}

{{--                </div>--}}
{{--            </li>--}}

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('admin') }}/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="ml-1">{{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('index_page') }}" target="_blank" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('admin') }}/images/logo-light.png" alt="" height="16">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{ asset('admin') }}/images/logo-sm.png" alt="" height="28">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li class="d-none d-sm-block">
{{--                <form class="app-search">--}}
{{--                    <div class="app-search-box">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" class="form-control" placeholder="Search...">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn" type="submit">--}}
{{--                                    <i class="fe-search"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
            </li>

        </ul>
    </div>
    <!-- end Topbar -->


    <div id="delete_modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Delete Confirmation !</h4>
        <div class="custom-modal-text">
            <h3 style="text-align: center; color: black">Are you sure to delete?</h3>
            <p>Please make sure that, you really need to delete it. Otherwise you can update also all of the content of this item.</p>
            <form action="" class="text-center" id="delete_modal_form" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mr-2">Yes! Delete</button>
                <button type="button" onclick="Custombox.modal.close();" class="btn btn-primary">No! Thanks</button>
            </form>
        </div>
    </div>


    @include('layouts.partials.admin_sidebar')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">
                                @yield('page_title')
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('main_content')


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                     Copyright © 2025 All Rights Reserved by <a
                                href="https://innovait.com.bd" target="_blank" class="hover:underline">INNOVA IT</a>

                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h5 class="m-0 text-white">Settings</h5>
    </div>
    <div class="slimscroll-menu">
        <hr class="mt-0">
        <h5 class="pl-3">Update Your Profile</h5>
        <hr class="mb-0" />


        <div class="p-3">
            <form action="{{route('auth_setting.update', auth()->id())}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="name">Name</label>
                    <input value="{{auth()->user()->name}}" type="text" placeholder="Name" name="name" class="form-control" id="name">
                </div>
                <div class="mb-2">
                    <label for="email">Email</label>
                    <input value="{{auth()->user()->email}}" type="email" placeholder="Email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-2">
                    <label for="phone_number">Phone Number</label>
                    <input value="{{auth()->user()->phone_number}}" type="text" placeholder="Phone Number" name="phone_number" class="form-control" id="phone_number">
                </div>
                <div class="mb-2">
                    <label for="old_password">Old Password (If You Change)</label>
                    <input type="password" placeholder="Old Password" name="old_password" class="form-control" id="old_password">
                </div>
                <div class="mb-2">
                    <label for="new_password">Create New Password</label>
                    <input type="password" placeholder="Create New Password" name="new_password" class="form-control" id="new_password">
                </div>
                <div class="mb-2 text-center">
                    <button class="btn btn-outline-primary">Update Now</button>
                </div>

            </form>
        </div>



    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('admin') }}/js/vendor.min.js"></script>
<script src="{{ asset('admin') }}/libs/sweetalert3/sweetalert2.min.js"></script>

<!-- Chart JS -->
<script src="{{ asset('admin') }}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->
<script src="{{ asset('admin') }}/js/pages/dashboard.init.js"></script>

<script src="{{ asset('admin/libs/custombox/custombox.min.js') }}"></script>

@yield('js')

<!-- App js -->
<script src="{{ asset('admin') }}/js/app.min.js"></script>



{{-- toastr --}}
<script src="{{asset('admin')}}/js/toastr.min.js"></script>

{!! Toastr::message() !!}


<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
        toastr.error('{{ $error }}', 'Error', {
            closeButton: true,
            progressBar: true
        });
    @endforeach
    @endif

    function setActionToModal(get_action){
        document.getElementById('delete_modal_form').setAttribute('action', get_action)
    }




</script>
<script>
    $(".number").on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1')
    });

    $(".print").on('click', function() {
        window.print()
    });

</script>
</body>
</html>

