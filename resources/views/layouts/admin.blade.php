<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>The Art W</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('asset_admin/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/css/select2.min.css') }}">
        <!-- Font-awesome web fonts with css -->
        <link href="{{ asset('asset_admin/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css"/>
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('asset_admin/images/favicon.png') }}" />
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.css">
        <style type="text/css">
            .parsley-errors-list {
              color: red;
            }
        </style>
    </head>
    <body class="sidebar-icon-only">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="dashboard.php"><img src="{{ asset('asset_admin/images/logo-white.png') }}" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="{{ asset('asset_admin/images/logo-white.png') }}" alt="logo" /></a>
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
                                    <img src="{{ asset('asset_admin/images/faces/face1.jpg') }}" alt="image">
                                    <span class="availability-status online"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1"> {{ auth('admin')->user()->name }}</p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <!-- <a class="dropdown-item" href="my-profile.php">
                                    <i class="mdi mdi-account mr-2"></i> My Profile</a> -->
                                <a class="dropdown-item" href="{{ route('admin.update.password.show')}}">
                                <i class="mdi mdi-lock-reset mr-2"></i> Change Password</a>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-power mr-2"></i> {{ __('Logout') }} </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas') }}">
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
                                    <img src="{{ asset('asset_admin/images/faces/face1.jpg') }}" alt="profile">
                                    <span class="login-status online"></span>
                                    <!--change to offline or busy as needed-->
                                </div>
                                <div class="nav-profile-text d-flex flex-column">
                                    <span class="font-weight-bold mb-2">{{ auth('admin')->user()->name }}</span>
                                    <span class="text-secondary text-small">Admin</span>
                                </div>
                                <!--  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">General Pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-settings menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                                <ul class="nav flex-column sub-menu">
                                    {{-- <li class="nav-item"> <a class="nav-link" href="home-banner-details.php">Home Banner Details</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="exibition-img-list.php">Exhibitions Image</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="partner-list.php">Exhibitors & Partners</a></li> --}}
                                    <!--  <li class="nav-item"> <a class="nav-link" href="how-to-work.php">How It Work</a></li> -->
                                    {{-- <li class="nav-item"> <a class="nav-link" href="faq-list.php">FAQ</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="services.php">Services</a></li> --}}
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.about.us')}}">About Us</a></li>
                                    {{-- <li class="nav-item"> <a class="nav-link" href="testimonial-list.php">Testimonial</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="blogs-list.php">Blogs</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="contact-list.php">Contact Us</a></li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Legal</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-hammer menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic1">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.terms.conditions') }}">Terms & Conditions</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.privacy.policy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </li>
                        <!--  <li class="nav-item">
                            <a class="nav-link" href="home-banner-details.php">
                              <span class="menu-title">Home Banner Details</span>
                              <i class="mdi mdi-file menu-icon"></i>
                            </a>
                            </li> -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Product Related</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file-image menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic1">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.artist.list') }}">Artists</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.painting.list') }}">Painting List</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">User Details</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic1">
                                <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.user.list') }}">User List</a></li>
                                    {{-- <li class="nav-item"> <a class="nav-link" href="order-history.php">Order History</a></li> --}}
                                    {{-- <li class="nav-item"> <a class="nav-link" href="feedback-list.php">Feedback</a></li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.art.cash') }}">
                            <span class="menu-title">Art Cash</span>
                            <i class="mdi mdi-cash menu-icon"></i>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="tutorial-page.php">
                            <span class="menu-title">Tutorial Page</span>
                            <i class="mdi mdi-video menu-icon"></i>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="update-token.php">
                            <span class="menu-title">Updated Token</span>
                            <i class="mdi mdi-cash menu-icon"></i>
                            </a>
                        </li> --}}
                        <!-- 
                            <li class="nav-item">
                              <a class="nav-link" href="client-list.php">
                                <span class="menu-title">Client</span>
                                <i class="mdi mdi-contacts menu-icon"></i>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="verifier-list.php">
                                <span class="menu-title">Verifier</span>
                                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="verifier_on_boarding.php">
                                <span class="menu-title">Verifier On-boarding <br>Requests</span>
                                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                              </a>
                            </li> -->
                        <!--   <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                              <span class="menu-title">Basic UI Elements</span>
                              <i class="menu-arrow"></i>
                              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                            </a>
                            <div class="collapse" id="ui-basic">
                              <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                              </ul>
                            </div>
                            </li> -->
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
        <script src="{{ asset('asset_admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('asset_admin/vendors/chart.js/Chart.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('asset_admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('asset_admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('asset_admin/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('asset_admin/js/dashboard.js') }}"></script>
        <script src="{{ asset('asset_admin/js/todolist.js') }}"></script>
        <!-- End custom js for this page -->
        <!-- Custom js for this page -->
        <script src="{{ asset('asset_admin/js/file-upload.js') }}"></script>
      <!--   <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script> -->
        <script src="{{ asset('asset_admin/js/select2.full.min.js') }}"></script>
        <script>
            $(function () {
            $("#select-new").select2();
             $("#select-new1").select2();
            $("#select-new2").select2();
            $("#select-new3").select2();
            $("#select-new4").select2();
            $("#select-new5").select2();
            });
        </script>
        <script src="{{ asset('asset_admin/js/jquery.nice-select.min.js') }}"></script>
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
        <script>
            $('#datepicker1').datepicker({
              changeMonth: false,
              changeYear: true,
              showButtonPanel: true,
              dateFormat: 'yy',
              onClose: function(dateText, inst) { 
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  $(this).datepicker('setDate', new Date(year, 0, 1));
              }});
        </script>
    </body>
</html>