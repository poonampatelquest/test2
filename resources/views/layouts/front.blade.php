<!DOCTYPE html>
<html>
    <head>
        <title>The Art W</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <!-- Favicon -->
        <!-- <base href="http://localhost:9008"> -->
        <!-- <base href="http://125.99.189.250:9008"> -->
        <link rel="icon" type="image/png" href="{{ asset('asset_front_side/images/fav-icon.png') }}">
        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('asset_front_side/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/bootstrap-dropdownhover.min.css') }}" rel="stylesheet"/>
        <!-- Animate CSS -->
        <link href="{{ asset('asset_front_side/css/animate.css') }}" rel="stylesheet"/>
        <!-- slick CSS -->
        <link href="{{ asset('asset_front_side/css/slick.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/slick-theme.css') }}" rel="stylesheet"/>
        <!-- hover-min CSS -->
        <link href="{{ asset('asset_front_side/css/hover-min.css') }}" rel="stylesheet"/>
        <!-- yamm css -->
        <link href="{{ asset('asset_front_side/css/yamm.css') }}" rel="stylesheet"/>
        <!-- Font-awesome web fonts with css -->
        <link href="{{ asset('asset_front_side/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css"/>
        <!-- Font-awesome web fonts with css -->
        <!-- loader css -->
        <link href="{{ asset('asset_front_side/css/loader.css') }}" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="{{ asset('asset_front_side/css/custom.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/custom-new.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/custom-new-art.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/custom-for-art.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front_side/css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('asset_front_side/css/style.css') }}" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Header html -->
        <header class="main-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/"><img src="{{ asset('asset_front_side/images/artwork-logo.png') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown for-desktop">
                            <a class="nav-link dropbtn">Platform <i class="fas fa-chevron-down"></i></a>
                              <div class="dropdown-content dropdwown-platform">
                                <div>
                                     <a class="new-tablink" href="{{ route('front.howitwork') }}"><i class="fas fa-arrow-right"></i>How it Works</a>
                                     <a class="new-tablink" href="{{ route('front.services') }}"><i class="fas fa-arrow-right"></i>Services</a>
                                     <a class="new-tablink" href="{{ route('front.faq') }}"><i class="fas fa-arrow-right"></i>FAQ</a>
                                     <a class="new-tablink" href="{{ route('front.about.us') }}"><i class="fas fa-arrow-right"></i>About Us</a>
                                     <a class="new-tablink" href="{{ route('front.term.condition') }}"><i class="fas fa-arrow-right"></i>Terms and Conditions </a>
                                     <a class="new-tablink" href="{{ route('front.contact.us') }}"><i class="fas fa-arrow-right"></i>Enquiry </a>
                                  </div>
                              </div>
                          </li>
                                <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.artist.list') }}">Artists</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('artist.login')}}"> Add Artwork</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav right-side-menu ml-auto">
                        <li class="nav-item search-outer">
                            <div id="wrap">
                                <form action="" autocomplete="on">
                                    <input id="search" name="search" type="text" placeholder="Search..">
                                    <span class="search"><i class="fas fa-search"></i></span>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/verifiyByScan"><i class="far fa-heart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/verifiyByScan"><i class="fas fa-cart-plus"></i></a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.show') }}">Login</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home') }}">Dashboard</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
        <div class="banner-newsletter lzy" style="background-image: url(&quot;https://d17h7hjnfv5s46.cloudfront.net/assets_side/build/images/banners/banner_newsletter.35310dfc.jpg&quot;);">
            <div class="container">
                <div class="row align-item-center">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-sm-offset-0 col-xs-offset-0">
                        <i class="icon icon-ico-newsletter"></i>
                        <div class="title">
                            Subscribe to the Valid Artwork newsletter
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-offset-0">
                        <div class="">
                            <div class="news-letter">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email ID" id="subscribeEmailId">
                                    <div class="input-group-append">
                                        <button class="btn common-btn-new" type="button" onclick="Subscribe()" >Subscribe</button>
                                    </div>
                                </div>
                                <span id="emialErr"
                                 style="color: red;"></span>
                                <span id="emialSuccess"   style="color: green;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="f-logo f-cat hidden-xs hidden-sm">
                            <a href="#" title="The ArtWorld"><img src="{{ asset('asset_front_side/images/artwork-logo.png') }}"></a>
                            <!-- <iframe width="100%" height="260" src="https://www.instagram.com/p/BHtebLKjEg8/embed" frameborder="0"></iframe> -->
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="f-cat">Customer services</div>
                        <ul class="f-links en">
                            <li><a href="/contact-us" class="gen-contact">Contact us</a></li>
                            <!-- <li><a href="" target="_blank">Legal notices</a></li> -->
                            <li><a href="">Gift an Artwork</a></li>
                            <li><a href="">Art for Corporate Offices</a></li>
                            <li><a href="">Art for Interior designers</a></li>
                            <li><a href="">Art for collectors</a></li>
                            <!-- <li><a href="">Art for Interior Designers</a></li> -->
                            <li><a href="" target="_blank">Terms and Conditions</a></li>
                            <!-- <li class="phone"><a href=""><i class="icon icon-ico-phone"></i> +44 203 445 6333</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="f-cat">About Us</div>
                        <ul class="f-links en">
                            <li><a href="">Our story</a></li>
                            <li><a href="" target="_blank" rel="noopener">Testimonials</a></li>
                            <li><a href="">Artist Profiles</a></li>
                            <li><a href="">FAQ</a></li>
                            <!-- <li><a href="">Career</a></li> -->
                            <li><a href="" target="_blank">Career</a></li>
                            <li><a href="#" class="gen-contact">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="f-cat">Partner Network</div>
                        <ul class="f-links en">
                            <li><a href="">Register as an Artist</a></li>
                            <li><a href="">Register as an Agency</a></li>
                            <li><a href="">Already a Partner? Login</a></li>
                        </ul>
                        <div class="f-cat sm">ArtArtists in focus</div>
                        <ul class="f-links">
                            <li><a href="">Wajid khan</a></li>
                            <li><a href="">Josep Moncada</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 offset-md-4 hidden-xs hidden-sm">
                        <ul class="f-socials">
                            <li>Follow us</li>
                            <li class="f-soc"><a href="https://www.facebook.com/questglt" target="_blank"> <i class="icon fab fa-facebook-f"></i></a></li>
                            <li class="f-soc"><a href="https://twitter.com/QuestGlt" target="_blank"> <i class="icon fab fa-twitter"></i></a></li>
                            <li class="f-soc"><a href="" target="_blank"><i class="icon fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 ml-auto">
                        <div class="copy-right-new">© 2019 Powered By Quest Global Technologies</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade enquiry-form-modal" id="hire-atrist-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h3 class="main-home-heading">Hire An Artist</h3>
                                    <h6 class="small-heading-home">Provide your details so that we can connect.</h6>
                                </div>
                            </div>
                        </div>
                        <div class="certify-form-box for-hire-now">
                            <form class="main-form-common">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Full Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email ID">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group box">
                                            <select class="form-control" name="artwork_type" id="artwork_type" style="display: none;">
                                                <option>Select an Artist</option>
                                                <option>Artist 1</option>
                                                <option>Artist 2</option>
                                                <option>Artist 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Message" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="common-btn-new" id="testButton" onclick="takevalueofform()" type="button">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('asset_front_side/js/jquery-2.2.0.min.js') }}"></script>
        <!-- <script type="text/javascript" src="{{ asset('asset_front_side/js/jquery-1.11.3.min.js') }}"></script> -->
        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript" src="{{ asset('asset_front_side/js/bootstrap.min.js') }}"></script>
        <!-- dropdownhover effects JavaScript -->
        <script type="text/javascript" src="{{ asset('asset_front_side/js/bootstrap-dropdownhover.min.js') }}"></script>
        <!-- slick JavaScript -->
        <script type="text/javascript" src="{{ asset('asset_front_side/js/slick.js') }}"></script>
        <script type="text/javascript" src="{{ asset('asset_front_side/js/slick.min.js') }}"></script>
        <!-- wow JavaScript -->
        <script type="text/javascript" src="{{ asset('asset_front_side/js/wow.min.js') }}"></script>
        <!-- video player JavaScript -->
        <script src="{{ asset('asset_front_side/js/jquery.nice-select.min.js') }}"></script>
        <!--  -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="{{ asset('asset_front_side/js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

        <script>
            $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 50000,
            values: [0, 50000],
            slide: function (event, ui) {
                $("#amount").val("" + ui.values[0] + " - " + ui.values[1]);
            }
        });
        
        $("#amount").val("" + $("#slider-range").slider("values", 0) +
            " - " + $("#slider-range").slider("values", 1));
    });
    $(function () {
        $("#height-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [0, 50000],
            slide: function (event, ui) {
                $("#height").val("" + ui.values[0] + " - " + ui.values[1]);
            }
        });
        $("#height").val("" + $("#height-range").slider("values", 0) +
            " - " + $("#height-range").slider("values", 1));
    });
    $(function () {
        $("#width-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [0, 50000],
            slide: function (event, ui) {
                $("#width").val("" + ui.values[0] + " - " + ui.values[1]);
            }
        });
        $("#width").val("" + $("#width-range").slider("values", 0) +
            " - " + $("#width-range").slider("values", 1));
    });

    $(document).ready(function () {
        $('select:not(.ignore)').niceSelect();
        FastClick.attach(document.body);
    });

    jQuery(document).ready(function ($) {
        var navbar = $('.header-main'),
            distance = navbar.offset().top + 5,
            $window = $(window);

        $window.scroll(function () {
            if ($window.scrollTop() >= distance) {
                navbar.removeClass('header-fixed').addClass('header-fixed');
                $("body").css("padding-top", "0px");
            } else {
                navbar.removeClass('header-fixed');
                $("body").css("padding-top", "0px");
            }
        });
    });
    $(document).ready(function () {

        $(".filter-button").click(function () {
            var value = $(this).attr('data-filter');

            if (value == "all") {
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            } else {
                //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');

            }
        });

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");

    });
    $(document).ready(function () {
        $(".seller-option ul li a").click(function () {
            $(".seller-option ul li").removeClass("active");
            $(this).parent("li").addClass("active");
        });
    });
    $('#gNavi li').hover(function () {
        if ($(this).has('ul'))
            $(this).find('ul').stop().slideDown(200);
    }, function () {
        if ($(this).has('ul'))
            $(this).find('ul').stop().slideUp(200);
    });

    function Subscribe() {

        var email = $("#subscribeEmailId").val()
        if (email == "") {
            $("#emialErr").text("*email is required");
        } 
        else {

            $("#emialErr").text("");
            $.get("{{ route('front.subsciber') }}", { email }, function(data) {
                if(data.status == 1) {
                    $("#emialSuccess").html(data.message)
                    $("#emialSuccess").delay(6000).fadeOut();
                }
                else {
                    $("#emialErr").html(data.message)
                    $("#emialErr").delay(6000).fadeOut();
                }
            })

        }
    }

    $(".alert").delay(6000).fadeOut();

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    $(document).on('click', '.addInWishList', function (e) {
        id = $(this).attr('data-id');
        console.log(id);
        $.get("{{ route('user.add.wishlist') }}", { id })
        .success(function(resp) {
            if(resp.sucess) {
                if(resp.status) {
                    $(this).removeClass("fa-heart-o").addClass('fa-heart')
                    alert(resp.message);
                   
                }
                else {
                    $(this).removeClass("fa-heart").addClass('fa-heart-o')
                    alert(resp.message);
                }
            }else {

                if(resp.status == 401) {
                    alert("Login First");
                    location.href="{{ route('user.wishlist') }}"; 
                    return ;
                }
                alert(resp.message);
            }
        })
        .error(function() {
            location.replace("{{ route('login') }}"); 
        })

    });
        </script>
        @yield('script')

    </body>
</html>