<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>The Art W</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('asset_user/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/css/custom-old.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_user/css/select2.min.css') }}">
        <!-- Font-awesome web fonts with css -->
        <link href="{{ asset('asset_user/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css"/>
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('asset_user/images/favicon.png') }}" />
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.css">
        <style type="text/css">
            .parsley-errors-list {
                color: red;
            }
            .invalid-feedback {
                display: block;
            }
        </style>
        @yield('style')
    </head>
    <body class="sidebar-icon-only">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="dashboard.php"><img src="{{ asset('asset_user/images/logo-white.png') }}" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="{{ asset('asset_user/images/logo-white.png') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="search-field d-none d-md-block">
                        <form class="d-flex align-items-center h-100" action="#">
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <i class="input-group-text  mdi mdi-magnify"></i>
                                </div>
                                <input type="text" class="form-control bg-transparent" placeholder="Search projects">
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="{{ auth()->user()->profile_image }}" alt="image">
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1">{{ auth()->user()->name }}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <!-- <a class="dropdown-item" href="my-profile.php">
                                    <i class="mdi mdi-account mr-2"></i> My Profile</a> -->
                                <a class="dropdown-item" href="{{ route('user.update.password.show')}}">
                                <i class="mdi mdi-lock-reset mr-2"></i> Change Password</a>

                                <a class="dropdown-item" href="{{ route('user.update.profile.show')}}">
                                <i class="mdi mdi-lock-reset mr-2"></i> Change Profile </a>

                                <a class="dropdown-item" href="{{ route('user.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-power mr-2"></i> {{ __('Logout') }} </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item nav-profile">
                            <a href="#" class="nav-link">
                                <div class="nav-profile-image">
                                    <img src="{{ auth()->user()->profile_image }}" alt="profile">
                                    <span class="login-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                                <div class="nav-profile-text d-flex flex-column">
                                    <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                                    <span class="text-secondary text-small">User </span>
                                </div>
                                <!--  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home')}}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                                <span class="menu-title">Order Details</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic1">
                              <ul class="nav flex-column sub-menu">
                              <li class="nav-item"> <a class="nav-link" href="{{ route('user.address.list') }}">Address Book</a></li>
                                {{-- <li class="nav-item"> <a class="nav-link" href="my-order.php">My Order</a></li> --}}
                                {{-- <li class="nav-item"> <a class="nav-link" href="cancel-order.php">Cancel Order</a></li> --}}
                                <li class="nav-item"> <a class="nav-link" href="{{ route('user.wishlist') }}">My Wishlist</a></li>
                                <!-- <li class="nav-item"> <a class="nav-link" href="user-list.php">User List</a></li>
                                <li class="nav-item"> <a class="nav-link" href="order-history.php">Order History</a></li> -->
                              </ul>
                            </div>
                          </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('artist.art.cash' )}}">
                            <span class="menu-title">Art Cash</span>
                            <i class="mdi mdi-file-image menu-icon"></i>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020. All rights reserved.</span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('asset_user/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('asset_user/vendors/chart.js/Chart.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('asset_user/js/off-canvas.js') }}"></script>
        <script src="{{ asset('asset_user/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('asset_user/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('asset_user/js/dashboard.js') }}"></script>
        <script src="{{ asset('asset_user/js/todolist.js') }}"></script>
        <!-- End custom js for this page -->
        <!-- Custom js for this page -->
        <script src="{{ asset('asset_user/js/file-upload.js') }}"></script>
        <!-- <script src="{{ asset('asset_user/js/select2.full.min.js') }}"></script> -->
        <script>
            $(function () {
            // $("#select-new").select2();
            //  $("#select-new1").select2();
            // $("#select-new2").select2();
            // $("#select-new3").select2();
            // $("#select-new4").select2();
            // $("#select-new5").select2();
            });
        </script>
        <!-- <script src="{{ asset('asset_user/js/jquery.nice-select.min.js') }}"></script> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
              $('select:not(.ignore)').niceSelect();      
              FastClick.attach(document.body);
            });    
        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
        <script>
            $( function() {
              $( "#datepicker" ).datepicker();
              $( "#datepicker1" ).datepicker();
            } );



        </script>

        @yield('script')

        <script type="text/javascript">
            $(".alert").delay(3000).fadeOut();

        </script>

    </body>
</html>
<script>
    $(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function (e) {
      e.stopPropagation();
    });
    
</script>