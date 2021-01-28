@extends('layouts.front')
@section('content')
<section class="product-details-main-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="product-slider">
                    @foreach($data->artistPaintingImages as $img)
                    <div data-thumb="{{ $img->name }}">
                        <img src="{{ $img->name }}">
                    </div>
                    @endforeach
                  <!--   <div data-thumb="{{ asset('asset_front_side/images/products/painting-1.jpg') }}">
                        <img src="{{ asset('asset_front_side/images/products/painting-1.jpg') }}">
                    </div>
                    <div data-thumb="{{ asset('asset_front_side/images/products/painting-1.jpg') }}">
                        <img src="{{ asset('asset_front_side/images/products/painting-1.jpg') }}">
                    </div> -->
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="outer-imag-detials-box artwork-focus">
                    <div class="how-look-img-box">
                        <div class="side-slider">
                            @php($image = False)
                            @foreach($data->artistPaintingImages as $key => $img)
                            <div class="item for-show-look1">
                                <img src="{{ $img->name }}" class="img-fluid">
                                @php($image = $data->artistPaintingImages[0]->name)
                            </div>
                            @endforeach

                            @if($image)
                            <div class="item for-show-look1">
                                <img src="{{ asset('asset_front_side/images/other/show-look.jpg') }}" class="img-fluid">
                                <img src="{{ $image }}" class="img-look">
                            </div>
                            @endif
                            
                            <div class="item for-show-look2">
                                <a href="">
                                    <div class="desc-painting-all">
                                        <h4>Artist: {{ ucwords($data->artist->name) }}</h4>
                                        <div class="row inner-row">
                                            <div class="col-md-4 col-sm-4 col-4">
                                                <h6 class="heading-line">{{ ucwords($data->painting_name) }} <span>,{{ $data->year_of_production }}</span></h6>
                                                <div>
                                                    <img class="art-img-main" src="{{ $data->artist->profile_image }}">
                                                    <div class="signature-box">
                                                        <img src="{{ $data->artist->signature_image }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-8">
                                                <div>
                                                    <ul>
                                                        <li>
                                                            <img src="{{ asset('asset_front_side/images/other/ART-W-SEAL.png') }}" class="img-fluid">
                                                        </li>
                                                        <li>
                                                            <img src="{{ asset('asset_front_side/images/other/artistseal.png') }}" class="img-fluid">
                                                        </li>
                                                        <!--  <li>
                                                            <img src="{{ asset('asset_front_side/images/other/tick-green.png') }}" class="img-fluid">
                                                            </li> -->
                                                    </ul>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Orientation</h6>
                                                                <h3> {{ $data->orientation }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Location</h6>
                                                                <h3>{{ ucwords($data->location) }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Type</h6>
                                                                <h3>{{ $data->typeOfArtWork->name }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Size</h6>
                                                                <h3>{{ $data->height_width }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Category</h6>
                                                                <h3> {{ $data->paintingCategory->name }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Style</h6>
                                                                <h3>{{ $data->paintingStyle->name }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>For Sale</h6>
                                                                <h3>{{ $data->for_sale == 1 ? 'Yes' : 'No' }}</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-4">
                                                            <div class="inner-text">
                                                                <h6>Technique</h6>
                                                                <h3>{{ $data->paintingTechnique->name }}</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- <div class="col-md-12">
                                                            <h5 class="main-home-heading">Current Owner : John Doe</h5>
                                                            </div>   -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="past-event-table">
                                                    <h6>Past Events/History</h6>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Event</th>
                                                                <th scope="col">User</th>
                                                                <th scope="col">Timestamp</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Created</td>
                                                                <td> {{ $data->artist->name }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') . " | ". \Carbon\Carbon::parse($data->created_at)->format('H:i') }} </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h1>{{ ucwords($data->painting_name) }}<span>, {{ $data->year_of_production }} </span></h1>
                        <h2><a href="/artistDetailPage/5e5cb9719b64a1001c7ab58c">{{ ucwords($data->artist->name) }}, {{ ucwords($data->location) }}</a></h2>
                        <div class="artwork-details ">
                            <ul class="artwork-details-list">
                                <li>
                                    <div class="title">Technique</div>
                                    <div class="info">{{ $data->paintingTechnique->name }}</div>
                                </li>
                                <li>
                                    <div class="title">Other details</div>
                                    <div class="info">Artwork on supported wooden frame.Ready to hang.Framing on request.</div>
                                </li>
                                <li>
                                    <div class="title">Dimensions</div>
                                    <div class="info">{{ $data->height_width }}</div>
                                </li>
                                <li>
                                    <div class="title">Orientation</div>
                                    <div class="info">{{ $data->orientation }}</div>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($data->for_sale || $data->for_commissioned_work )
<section class="image-disc-pro-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 sidebar img-disc-box">
                        <div>

                            <div class="prices">
                                @if($data->for_sale)
                                <p><strong>Price</strong></p>
                                <span class="price-sold">{{ $data->basic_price }} INR</span>
                                <div class="artwork-sold">
                                    {!! $info->for_sale_text !!}
                                </div>
                                 @else
                                    <span class="price-sold">Not For Sale</span>
                                    <div class="artwork-sold">
                                        {!! $info->for_commissioned_work !!}
                                    </div>
                                    <div class="commission-button">
                                        <a class="common-btn-border" id="commission" href="javascript:void(0);">Commission this artist</a>
                                    </div>
                                     <div id="box-commission" class="box-commission" style="display: none;">
                                        <div class="close-commission-button commisionBoxClose"> <i class="fas fa-times"></i></div>
                                        <div class="alert alert-success respMessageDiv" style="display: none;">
                                            <span class="respMessage">{{ session('status') }} </span>
                                        </div>

                                        <form >
                                            <label>
                                                <textarea class="text-field"  rows="10" id="message" placeholder="Feel free to describe your ideal artwork to us. We’ll get back to you every time." required></textarea>
                                                <span id="c_texterr" style="color: red;"></span>

                                            </label>
                                            <label>
                                                <input type="email" id="email" class="text-field" placeholder="Your Email Address" required >
                                                <span id="c_emailerr" style="color: red;"></span>

                                            </label>
                                            <button type="button" class="common-btn-border" onclick="sendmessage()">Send message</button>
                                        </form>
                                        <div class="divider"> or </div>

                                        <div><a class="common-btn-border" href="#">Chat with our Art Advisors</a></div>
                                        <div class="phone-mobile">
                                            You can also call us at <a href="tel:+442034456333">+44 203 445 6333</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="explore">
                            <a class="link black phone-call-cta" href="#" rel="" data-act="phone-call"><i class="fa fa-phone"></i> Call me back</a>
                            <span>•</span>
                            <a id="askquestion" class="link black question-cta" href="javascript:void(0);" rel="" data-act="question"><i class="fas fa-question"></i> Ask us a question</a>
                        </div>
                        <div id="ask-details" class="box-commission" style="display: none;">
                            <div class="close-commission-button"> <i class="fas fa-times"></i></div>
                            <div class="alert alert-success askQuestionDiv" style="display: none;">
                                <span class="askQuestion">{{ session('status') }} </span>
                            </div>
                            <form>
                                <label>
                                <textarea class="text-field" rows="10" id="Q_message" placeholder="Your Message"></textarea>
                                <span id="texterr" style="color: red;"></span>
                                </label>
                                <label>
                                <input type="email" id="Q_email" class="text-field" placeholder="Your Email Address">
                                <span id="emailerr" style="color: red;"></span>
                                </label>
                                <button type="button" class="common-btn-border" onclick="sendquestion()"> Send message </button>
                            </form>
                        </div>
                        <div class="box-share">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" >
                                    <i class="far fa-heart"></i>
                                    </a>
                                </li>
                                <li class="email">
                                    <a class="share-by-email-cta">
                                    <i class="far fa-envelope"></i>
                                    </a>
                                </li>
                                <li class="share-active">
                                    <i class="fas fa-share-alt"></i>
                                    <div class="button-share">
                                        <ul>
                                            <li class="facebook">
                                                <a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook"><i class="icon fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a class="tweet" href="javascript:tweetCurrentPage()" target="_blank" alt="Tweet this page"> <i class="icon fab fa-twitter"></i></a>
                                            </li>
                                            <li class="pinterest">
                                                <a class="w-inline-block social-share-btn pin" href="http://pinterest.com/pin/create/button/?url=&amp;description=" target="_blank" title="Pin it" onclick="window.open('http://pinterest.com/pin/create/button/?url=' + encodeURIComponentaskquestion(document.URL) + '&amp;description=' + encodeURIComponentaskquestion(document.title)); return false;"> <i class="icon fab askquestion fa-pinterest-p"></i></a>
                                                askquestion
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="info-certificate">
                                    <img src="{{ asset('asset_front_side/images/other/guarantee-certificate.png') }}">
                                    <br>
                                    <div class="certificate-title">Original work delivered with a certificate of authenticity</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="info-shipping">
                                    <img src="{{ asset('asset_front_side/images/icons/free-shipping.png') }}"><br>
                                    <div class="certificate-title">Shipping usually takes up to 7 days.</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($data->painting_description))
<section class="artwork-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section"><img src="{{ asset('asset_front_side/images/other/guarantee-certificate.png') }}"> <span>About the artwork</span></div>
            </div>
            <div class="col-md-12">
                <div class="focus-desc">
                    <div id="a-desc">
                        {!! $data->painting_description !!}
                        <!-- <p>This large statement piece butterfly diptych is finished with a light protective spray, yielding an overall matte finish, with some areas of differing sheen. Sides are unpainted/rough. Each canvas measures 84"x60", signed on back and side of each. Words in lower right corner: "a brief step backward -- then a great leap forward". Ready to hang with attached D-rings on the back of each canvas.<br>
                            <br>"Normally my thinking mind is quiet when I'm painting,
                        </p>
                        <span class="more-dots" id="dots"></span>
                        <span class="more-text hidden" id="more" style="display: none;"> but this piece was a little different. The letters A, T and P on the left hand canvas represent 'all things pass'; darkness doesn't last forever; it passes, yielding to the light eventually. The letters also refer to ATP, the cellular molecule that transports the energy needed for all metabolic activities in the body." 
                        </span>
                        <a href="javascript:void(0);" class="link read-more" onclick="myFunction()" id="myBtn">Read more</a> -->
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>
@endif

<section class="artwork-details">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <img class="img-fluid" src="{{ $data->artist->profile_image }}" alt="Amel Chamandy">
                </div>
            </div>
            <div class="col-md-6">
                <div class="title-section"><img src="{{ asset('asset_front_side/images/other/left-quotes-sign.png') }}"> <span>{{ $data->artist->name }}</span></div>
                <p>« </p>
                <p>
                    {!! $data->artist->any_content !!}
                </p>
                »
                <p></p>
            </div>
            <div class="col-md-2">
                <div class="artist-details">
                    <div class="box-artist-keys">
                        <div class="title">Credentials</div>
                        <ul class="artist-keys">
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Acclaimed Artist</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Market Value</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> One to Watch</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Works on commission</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div  class="artist-details">
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div>
                                <a href="" class="common-btn-border">+ Follow this Artist</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="artist-share">
                                Share this artist:
                                <ul>
                                    <li class="facebook">
                                        <a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook"><i class="icon fab fa-facebook-f">
                                        </i></a>
                                    </li>
                                    <li class="twitter">
                                        <a class="tweet" href="javascript:tweetCurrentPage()" target="_blank" alt="Tweet this page"> <i class="icon fab fa-twitter"></i></a>
                                    </li>
                                    <li class="pinterest">
                                        <a class="w-inline-block social-share-btn pin" href="" target="_blank" ><i class="icon fab fa-pinterest-p" ></i></a>
                                    </li>
                                    <li class="email">
                                        <a class="w-inline-block social-share-btn email" href="" target="_blank" title="Email" ><i class="icon fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sort-sec">
    <div class="container-fluid">
        <div class="row painting-main-row" id="my-div-full">
            <div class="col-md-12">
                <div class="outer-box-artist-img">
                    @foreach($data->artist->artistPaintings as $firstPainting)
                    <div class="inner-artist-box">
                        <a href="{{ route('front.artist.painting.detail', [ $data->artist->name, $firstPainting->painting_name, encrypt($firstPainting->id) ] ) }}">
                            <img src="{{ $firstPainting->getFirstImage() }}">
                        </a>
                        <div class="art-actions " data-id="">
                            <i class="icon far {{ $firstPainting->isInWishList() ? 'fa-heart' : 'fa-heart-o' }} addInWishList" data-id="{{ $firstPainting->id }}" ></i>
                        </div>

                        <div class="painting-name">
                            {{ $firstPainting->painting_name }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="see-more-btn">
                <a href="javascript:void(0);" id="see-less" class="test1" >See +</a>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(".product-slider").slick({
        dots: true,
        customPaging : function(slider, i) {
    var thumb = $(slider.$slides[i]).data('thumb');
    return '<a><img src="'+thumb+'"></a>';
    },
        autoplay: false,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: false,
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
    
     $(".side-slider").slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: false,
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
</script>
<script>
    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "block";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less"; 
        moreText.style.display = "block";
      }
    };
    $("#commission").click(function(){
      $("#box-commission").toggle();
    });

    $(".commisionBoxClose").click(function(){
      $("#box-commission").toggle();
    });
    
    
    $("#askquestion").click(function(){
      $("#ask-details").toggle();
    });
</script>
<script>
    $(".test1").click(function(){
       
     var element =document.getElementById("my-div-full")
    
     element.classList.toggle("full-width");
    })
    
</script>
<script>
    function sendmessage() {

        var message=  $("#message").val()
        var email =$("#email").val()
        if(email==""||message=="") {
            if(email=="") {
                $("#c_emailerr").text("*email is required")
            }else {
                $("#c_emailerr").text("")
            }
            if(message=="") {
                $("#c_texterr").text("*text is required")
            }
            else {
                $("#c_texterr").text("")
            }
        }
        else {
            $("#c_texterr").text("")
            $("#c_emailerr").text("")
            paintingId = "{{ $data->id }}"
            $.get("{{ route('front.artist.commision.message') }}", { message, email, paintingId }, function(resp) {

                if(resp.status == 1) {
                    $("#message").val("")
                    $("#email").val("")
                    $(".respMessageDiv").show().addClass('alert-success').removeClass('alert-danger');
                    $(".respMessage").html(resp.message);
                    $(".respMessage").html(resp.message);
                }
                else {
                    console.log(resp.message)
                    $(".respMessageDiv").show().addClass('alert-danger').removeClass('alert-success');
                    $(".respMessage").html(resp.message);

                }

            });
        }
    }

    function sendquestion() {
        var message=  $("#Q_message").val()
        var email =$("#Q_email").val()

        if(email=="" || message=="") { 
            if(email == "" ) { 
                $("#emailerr").text("*email is required")
            }
            else {
                $("#emailerr").text("")
            }

            if(message=="") {
                $("#texterr").text("*message is required")
            }
            else {
                $("#texterr").text("")
            }
    
        }
        else {
            $("#texterr").text("")
            $("#emailerr").text("")

            $.get("{{ route('front.askquestion') }}", { message, email }, function(resp) {

                if(resp.status == 1) {
                    // alert("Your question has been sent successfuly")
                    $("#Q_message").val(" ")
                    $("#Q_email").val(" ")
                    $(".askQuestionDiv").show().addClass('alert-success').removeClass('alert-danger');
                    $(".askQuestion").html(resp.message);
                    $(".askQuestion").html(resp.message);
                                  }
                else {

                    $(".askQuestionDiv").show().addClass('alert-danger').removeClass('alert-success');
                    $(".askQuestion").html(resp.message);

                }
                $(".alert").delay(6000).fadeOut();

            });
       }
    }
    
</script>
<script language="javascript">
    function fbshareCurrentPage()
    {window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(window.location.href)+"&t="+document.title, '', 
    'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
    return false; }
    
    
    function tweetCurrentPage()
    { window.open("https://twitter.com/share?url="+ encodeURIComponent(window.location.href)+"&text="+document.title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false; }
    
</script>
@endsection