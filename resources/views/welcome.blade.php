@extends('layouts.front')
@section('content')
<!-- Slider Section html -->
<section class="sec-slider section-bttom-border">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-slider">
                    <div class="item">
                      <div class="banner-inner">
                        <img src="{{ asset('asset_front_side/images/banners/banner1.jpg') }}" class="img-fluid">
                        <div class="banner-left-text">
                            <h2><span>The art on</span> <br>blockchain</h2>
                            <h6>We Understand The Art and Blockchain</h6>
                            <div>
                              <a href="/contact-us" target="_blank" class="white-btn-border">Join Us Now</a>
                            </div>
                          </div>
                      </div>
                    </div>
                <!--     <div class="item">
                      <div class="banner-inner">
                        <img src="{{ asset('asset_front_side/images/banners/banner2.jpg') }}" class="img-fluid">
                        <div class="banner-left-text">
                            <h2><span>The art on</span> <br>blockchain</h2>
                            <h6>We Understand The Art and Blockchain</h6>
                            <div>
                              <a href="/contact-us" target="_blank" class="white-btn-border">Join Us Now</a>
                            </div>
                          </div>
                      </div>
                    </div> -->
                    <!-- <div class="item">
                      <div class="banner-inner">
                        <img src="{{ asset('asset_front_side/images/banners/banner3.jpg') }}" class="img-fluid">
                        <div class="banner-left-text">
                            <h2><span>The art on</span> <br>blockchain</h2>
                            <h6>We Understand The Art and Blockchain</h6>
                            <div>
                              <a href="/contact-us" target="_blank" class="white-btn-border">Join Us Now</a>
                            </div>
                          </div>
                      </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-artist section-bttom-border">
  <div class="container container-home">
    <div class="row">
      <div class="col-md-12">
        <div class="mb-30">
          <!-- <h6 class="small-heading-home">Our Artists</h6> -->
          <h3 class="main-home-heading">Our Artists</h3>
        </div>
      </div>
    </div>
    <div class="artist-slider">
       <div class="item">
         <div class="row">
            <div class="col-md-5">
               <div>
                  <img src="{{ asset('asset_front_side/images/products/wajid-khan.png') }}" class="img-fluid">
               </div>
            </div>
            <div class="col-md-6 offset-md-1">
              <h4>Artist Wajid Khan</h4>
              <p>Wajid Khan (born 10 March 1981) is an Indian artist, portraitist, sculptor, inventor and patent holder. He has specialized in carving canvas with nails. Recognizing his outstanding nail art, Khan was named in the Guinness Book of World Records, Limca Book of Records, and Asia Book of Records.</p>
              <p>One of his artworks is part of Rashtrapati Bhavan, the official home of the President of India.</p>
              <p>He holds many records which includes –</p>
              <ul>
                <li>* Guinness Book of World Records</li>
                <li>* Limca Book of Records</li>
                <li>* 37 World Record Holder</li>
                <li>* 8 Patent Holder</li>
              </ul>
              <div class="btn-with-small-text">
                <a href="" target="_blank" class="common-btn-border">See Artworks</a>
              </div>
            </div>
          </div>
       </div>
     <!--   <div class="item">
         <div class="row">
            <div class="col-md-5">
               <div>
                  <img src="{{ asset('asset_front_side/images/products/wajid-khan.png') }}" class="img-fluid">
               </div>
            </div>
            <div class="col-md-6 offset-md-1">
              <h4>Artist Wajid Khan</h4>
              <p>Wajid Khan (born 10 March 1981) is an Indian artist, portraitist, sculptor, inventor and patent holder. He has specialized in carving canvas with nails. Recognizing his outstanding nail art, Khan was named in the Guinness Book of World Records, Limca Book of Records, and Asia Book of Records.</p>
              <p>One of his artworks is part of Rashtrapati Bhavan, the official home of the President of India.</p>
              <p>He holds many records which includes –</p>
              <ul>
                <li>* Guinness Book of World Records</li>
                <li>* Limca Book of Records</li>
                <li>* 37 World Record Holder</li>
                <li>* 8 Patent Holder</li>
              </ul>
              <div class="btn-with-small-text">
                <a href="" target="_blank" class="common-btn-border">See Artworks</a>
              </div>
            </div>
          </div>
       </div> -->
    </div>
  </div>
</section>

<section class="exhibition-sec section-bttom-border">
  <div class="container container-home">
    <div class="row">
      <div class="col-md-6">
        <div>
          <h6 class="small-heading-home">Exhibitions</h6>
          <h3 class="main-home-heading">Want a collection of <br> paintings for your exhibition?</h3>
          <div class="btn-with-small-text">
            <a href="" class="common-btn-border" data-toggle="modal" data-target="#enquiryModal">Enquire Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="exibition-img-box">
           <div class="img-1-exibition">
             <img src="{{ asset('asset_front_side/images/other/home-image1.png') }}" class="img-fluid">
           </div>
            <div class="img-2-exibition">
             <img src="{{ asset('asset_front_side/images/other/home-image2.png') }}" class="img-fluid">
           </div>
            <div class="img-3-exibition">
             <img src="{{ asset('asset_front_side/images/other/home-image3.png') }}" class="img-fluid">
           </div>
            <div class="img-4-exibition">
             <img src="{{ asset('asset_front_side/images/other/home-image4.png') }}" class="img-fluid">
           </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cerify-main-sec section-bttom-border">
    <div class="container container-home">
      <div class="row">
        <div class="col-md-6">
          <div>
            <h6 class="small-heading-home">Exhibitors & Partners</h6>
            <h3 class="main-home-heading">India’s First Blockchain based Secured Digital <br> Identity for a Work of Art</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div>
           <!--  <ul class="nav nav-tabs verifiers-tab" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ceritfiers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Verifiers</a>
              </li>
            </ul> -->
            <div class="tab-content verifier-main-content-box" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                 <div class="row main-content-row-certifier align-item-center">
                   <div class="col-md-7 offset-md-1">
                     <div class="left-hand-text">
                        <h3>TheArtW Certificate</h3>
                          <p>We utilize advanced technologies, Blockchain and Internet of Things (IoT) to secure artwork for you, both physically and digitally. Our blockchain-based ledger system enables the creation of tamper-proof provenance records of an artwork. Such digitized records are encrypted and time stamped and signed by our authentic partner network, which can be verified anywhere, anytime. Our smart Artw Certificates form an integral part of the artwork for maximum security and are easily transferable. Any collector can check the history of the artwork by using mobile device or computer.</p>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="main-img-certified">
                        <img src="{{ asset('asset_front_side/images/other/home-image5.png') }}" class="img-fluid">
                       <div class="certificate-img">
                         <img src="{{ asset('asset_front_side/images/other/home-image6.png') }}" class="img-fluid">
                       </div>
                     </div>
                   </div>
                 </div>
                  <div class="row main-content-row-certifier for-order-change align-item-center">
                   <div class="col-md-7 order-2">
                     <div class="left-hand-text">
                        <h3>Hassle Free Management</h3>
                          <p>Manage all your artwork inventory, share/transfer them effortlessly, digital certificates, earnings, commissioned work, royalty payments, connects </p>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="main-img-certified">
                        <img src="{{ asset('asset_front_side/images/other/home-image7.png') }}" class="img-fluid">
                       <div class="certificate-img">
                         <img src="{{ asset('asset_front_side/images/other/home-image8.png') }}" class="img-fluid">
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="row main-content-row-certifier align-item-center">
                   <div class="col-md-7 offset-md-1">
                     <div class="left-hand-text">
                        <h3>Other Benefits</h3>
                          <p>Get your Artworks digitally certified, FREE of Cost</p>
                          <p>Fraud Prevention </p>
                          <p>Track Artwork from origination to sales</p>
                          <p>Earn extra royalties whenever artwork is sold</p>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="main-img-certified">
                        <img src="{{ asset('asset_front_side/images/other/home-image9.png') }}" class="img-fluid">
                       <div class="certificate-img">
                         <img src="{{ asset('asset_front_side/images/other/home-image10.png') }}" class="img-fluid">
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row main-content-row-certifier align-item-center">
                   <div class="col-md-7 offset-md-1">
                     <div class="left-hand-text">
                        <h3>Documentation</h3>
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enimv ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et </p>
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="main-img-certified">
                        <img src="{{ asset('asset_front_side/images/banners/banner-login.png') }}" class="img-fluid">
                       <div class="certificate-img">
                         <img src="{{ asset('asset_front_side/images/banners/banner-login.png') }}" class="img-fluid">
                       </div>
                     </div>
                   </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<section class="home block-browse-by-price section-bttom-border">
    <div class="container">
      <div class="row align-item-center">
              <div class="col-md-3 col-sm-12 col-sm-offset-0">
                    <div>
                     <!--  <h6 class="small-heading-home">Lorem ipsum dolor sit amet,</h6> -->
                      <h3 class="main-home-heading">Featured Artworks</h3>
                    </div>
              </div>
              <div class="col-md-3 col-first col-sm-6">
                  

                  <div class="browse-by-price-element">
                      <!-- <a class="ga" href=""> -->
                          <figure>
                              <div class="thumb"><div class="masq"></div><img class="lzy loaded" src="{{ asset('asset_front_side/images/products/certificate_1578488707814_wajid-paint.jpeg') }}"></div>
                          </figure>
                      <!-- </a> -->
                  </div>

                  <div class="browse-by-price-element">
                      <!-- <a class="ga" href=""> -->
                          <figure>
                              <div class="thumb"><div class="masq"></div><img class="lzy loaded" src="{{ asset('asset_front_side/images/products/certificate_1579857442550_20190505_181652.jpg') }}"></div>
                          </figure>
                      <!-- </a> -->
                  </div>
                  
              </div>
              <div class="col-md-3 col-second col-sm-6">
                  

                  <div class="browse-by-price-element">
                      <!-- <a class="ga" href=""> -->
                          <figure>
                              <div class="thumb"><div class="masq"></div><img class="lzy loaded" src="{{ asset('asset_front_side/images/products/certificate_1579866092025_IMG_20200109_171301.JPG') }}"></div>
                          </figure>
                      <!-- </a> -->
                  </div>

                  <div class="browse-by-price-element">
                      <!-- <a class="ga" href=""> -->
                          <figure>
                              <div class="thumb"><div class="masq"></div><img class="lzy loaded" src="{{ asset('asset_front_side/images/products/certificate_1578967932954_IMG_20200112_161215.jpg') }}"></div>
                          </figure>
                      <!-- </a> -->
                  </div>
                  

              </div>
         
               <div class="col-md-3 col-second col-sm-6">
                  <div class="browse-by-price-element">
                      <!-- <a class="ga" href=""> -->
                          <figure>
                              <div class="thumb"><div class="masq"></div><img class="lzy loaded" src="{{ asset('asset_front_side/images/products/certificate_1578968154007_IMG_20200112_161137.jpg') }}"></div>
                          </figure>
                  </div>
              </div>
          </div>
    </div>
</section>

<section class="blog-sec section-bttom-border">
    <div class="container container-home">
      <div class="row">
        <div class="col-md-6">
          <div>
            <h6 class="small-heading-home">Our Blog</h6>
            <h3 class="main-home-heading">Read our blogs</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="blog-slider">
            <div class="item">
              <div class="blog-box-inner">
                <div class="row">
                  <div class="col-md-4">
                    <div class="side-img-blog">
                      <img src="{{ asset('asset_front_side/images/other/home-image15.png') }}" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-md-7 offset-md-1">
                    <div class="content-blog">
                      <p class="typ-painting">Nature Paintings</p>
                      <h3>know more about nature paintings on blockchain</h3>
                      <p class="post-date">Oct 20, 2019</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                      <div>
                        <a class="read-more" href="">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="blog-box-inner">
                <div class="row">
                  <div class="col-md-4">
                    <div class="side-img-blog">
                      <img src="{{ asset('asset_front_side/images/other/image1.png') }}" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-md-7 offset-md-1">
                    <div class="content-blog">
                      <p class="typ-painting">Nature Paintings</p>
                      <h3>know more about nature paintings on blockchain</h3>
                      <p class="post-date">Oct 20, 2019</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                      <div>
                        <a class="read-more" href="">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="modal fade enquiry-form-modal" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         <div class="row">
          <div class="col-md-12">
            <div class="text-center">
              <h3 class="main-home-heading">Enquiry for exhibitions</h3>
              <h6 class="small-heading-home">Provide your details so that we can connect.</h6>
              
            </div>
          </div>
        </div>
        <div class="certify-form-box">
          
             <form class="main-form-common" action="/Enquiry_for_exhibitions" method="POST" id="Enquiry_for_exhibitions">
              <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" name="name" data-rule-required="true" data-msg-required="Please enter name.">
                      </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <input type="email" class="form-control" placeholder="Email ID" name="email" data-rule-email=”true” data-msg-required="Please enter email.">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone Number" name="phone" data-rule-required="true" data-rule-number=”true” data-msg-required="Please enter phone number.">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="City" name="city" data-rule-required="true" data-msg-required="Please enter city.">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                      <textarea class="form-control" placeholder="Message" rows="5" name="message" data-rule-required="true" data-msg-required="Please enter message."></textarea>
                    </div>
                </div>
                
              </div>
         
               <div class="text-center">
                   <!-- <button class="common-btn-new" id="testButton" onclick="takevalueofform()" type="button">Submit</button> -->
                   <button class="common-btn-new" id="testButton"  type="submit">Submit</button>
                 </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

    <script type="text/javascript" src="{{ asset('asset_front_side/js/jquery-2.2.0.min.js') }}"></script>
  <script type="text/javascript">
            $(document).on('ready', function() {
                $(".banner-slider").slick({
                dots: false,
                autoplay: true,
                arrows:true,
                autoplaySpeed: 3000,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                responsive: [
                  {
                    breakpoint: 768,
                    settings: {
                      arrows: false,
                      centerMode:false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      arrows: false,
                      centerMode: false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  ]
              });
                $(".blog-slider").slick({
                dots: false,
                autoplay: true,
                arrows:true,
                autoplaySpeed: 3000,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [
                  {
                    breakpoint: 768,
                    settings: {
                      arrows: false,
                      centerMode:false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      arrows: false,
                      centerMode: false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  ]
              });
              $(".artist-slider").slick({
                dots: false,
                autoplay: false,
                arrows:true,
                autoplaySpeed: 1000,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [
                  {
                    breakpoint: 768,
                    settings: {
                      arrows: false,
                      centerMode:false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      arrows: false,
                      centerMode: false,
                      centerPadding: '40px',
                      slidesToShow: 1,
                      slidesToScroll: 1
                    }
                  }
                  ]
              });
            });
        </script>

@endsection    



