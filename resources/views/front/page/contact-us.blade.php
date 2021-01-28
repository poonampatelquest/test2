@extends('layouts.front')
@section('content')

<section class="contact-page-section">
        <div class="container">
            <div class="heading-box clearfix">
                <div class="sec-title">
                    <h2 class="main-home-heading">Contact Us</h2>
                    <!-- <div class="text">if You get any information contact now</div> -->
                </div>
                <div class="text">
                    <p>We are here to help and answer any queries you might have. You can talk to our online representative by using our live chat system. We look forward to hear from you.</p>
                </div>
            </div>
            <div class="row clearfix">
                    
                    
                <!-- Form Column -->
                <div class="form-column col-xl-9 col-lg-8 col-md-12 col-sm-12">
                      @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if(session('status_err'))
                    <div class="alert alert-danger">
                        {{ session('status_err') }}
                    </div>
                    @endif
                    <div class="contact-form-two">
                            <form action="{{ route('front.contact.us') }}" class="form-wrapper" method="POST" >
                                @csrf
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" placeholder="Name*" name="name" data-rule-required="true" data-rule-maxlength="24" data-msg-required="Please enter Full Name." required>
                                     @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                                <div class="col-md-6 col-sm-12 form-group">
                                        <input type="email" placeholder="Email*" name="email" id="email" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter Email Address." data-msg-email="Please enter a valid Email Address." required>
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject*" required="">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone*" required="" minlength="10" maxlength="10">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="col-md-12 col-sm-12 form-group">
                                        <textarea placeholder="Message" id="exampleFormControlTextarea1" rows="3" name="message" required=""></textarea>
                                        @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                                <div class="col-md-12 col-sm-12 form-group">
                                    <button class="btn common-btn-new" type="submit" name="Submit">Send Massage</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="contact-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <ul class="contact-info">
                            <li>
                                <span class="icon fas fa-home"></span> 
                                <strong>Visit Us</strong>
                                <p>Quest Global Technologies
                                202, Atulya IT Park, Indore
                                Madhya Pradesh 452014</p>
                            </li>

                            <li>
                                <span class="icon fas fa-envelope-open"></span> 
                                <strong>Send your mail at</strong>
                                <p><a href="#">info@questglt.com</a></p>
                            </li>

                            <li>
                                <span class="icon fa fa-phone"></span> 
                                <strong>Feel like talking</strong>
                                <p>+91 8815167885</p>
                            </li>

                            <li>
                                <span class="icon far fa-clock"></span> 
                                <strong>Working Hours</strong>
                                <p>Mon-Sat: 9.30am to 7.00pm</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection