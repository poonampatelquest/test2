@extends('layouts.front')
@section('content')

<section class="dashboard-inner-banner">
   <div class="breadcrb">
      <ol>
        <li>
          <span>Services</span>
        </li>
      </ol>        
</div>  
  <div class="container">
     <div class="row">
       <div class="col-md-7">
          <h4>Our Services</h4>
          <h2 class="gredient-text">Services</h2>
       </div>
     </div>
  </div>
</section>


<section class="services-section style-two">
        <div class="container">
            <div class="row">
                <!-- Service Block -->
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('asset_front_side/images/authentication.png') }}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <h3>Authentication and Provenance Tracking</h3>
                            <div class="text">Precious assets have existed long before humans walked the earth. There is now a solution to track the unique identity of an object over the course of its life without having to worry about the quality of past documentation or sources. One-time authentication, one object, one source of provenance.</div>
                        </div>
                    </div>
                </div>

                <!-- Service Block -->
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('asset_front_side/images/exhibition.png') }}" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <h3>Enhance your Earnings: Exhibitions & Royalty Payments</h3>
                            <div class="text">Collections and individual pieces of art are valuable assets that have before now only brought value to the viewer or at a point of sale. Explore and embrace new opportunities to monetize works in a warehouse, on display, or already sold depending on your ownership and authorship status.</div>
                        </div>
                    </div>
                </div>

                <!-- Service Block -->
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp animated">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('asset_front_side/images/smart-asset') }}-management.png" alt=""></figure>
                        </div>
                        <div class="lower-content">
                            <h3>Smart Asset Management Platform</h3>
                            <div class="text">Artists and arts institutions constantly have to track artworks and artifacts when shipping or receiving for shows, loans, or acquisitions. Manage your assets smarter when in transit or storage so you can trust that they are always accounted for and in the right hands.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection