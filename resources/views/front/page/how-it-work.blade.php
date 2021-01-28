@extends('layouts.front')
@section('content')
<section class="how-it-work-sec">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mb-20">
              <h6 class="small-heading-home">Work Flow</h6>
              <h3 class="main-home-heading mb-0">How It Works?</h3>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ordertab-1">
                        <div class="how-it-work-box down-arrow-mob mt-100">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks1.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Register with us by providing basic details.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ordertab-2">
                        <div class="how-it-work-box down-arrow-mob down-arrow-tab">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks2.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Upload your art for <br> verification.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ordertab-4">
                        <div class="how-it-work-box down-arrow-mob down-arrow swipe-arrow-tab mt-100">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks3.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Our system generates <br> unique code for your painting.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ordertab-3 order-3">
                        <div class="how-it-work-box down-arrow-mob down-arrow-tab swipe-arrow mt-100">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks4.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Securely add the unique code <br>by your mobile or computer.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 ordertab-5 order-2">  
                        <div class="how-it-work-box down-arrow-mob normal-arrow-tab swipe-arrow">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks5.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Paste it on back of the Art.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ordertab-6">
                        <div class="how-it-work-box down-arrow-mob after-none mt-100">
                            <div class="inner-work">
                                <div class="img-box">
                                    <img src="{{ asset('asset_front_side/images/other/howitworks6.png') }}">
                                </div>
                                <div class="content-box">
                                    <h5>Congratulations! <br> Your Art has been  digitized.</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection