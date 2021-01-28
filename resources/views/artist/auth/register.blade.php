<!DOCTYPE html>
<html>
    <head>
        <title>The Art W</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('asset_front/images/fav-icon.png') }}">
        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('asset_front/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front/css/bootstrap-dropdownhover.min.css') }}" rel="stylesheet"/>
        <!-- Font-awesome web fonts with css -->
        <link href="{{ asset('asset_front/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css') }}"/>
        <link href="{{ asset('asset_front/css/custom-new.css') }}" rel="stylesheet"/>
        <link href="{{ asset('asset_front/css/custom-new-art.css') }}" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">
        <style type="text/css">
            .error_validate{
            color: red;
            }

        </style>

        <style type="text/css">
            .invalid-feedback {
                color: red;
                display: block !important;
            }
        </style>
    </head>
    <body>
        <form class="form-wrapper" method="POST" action="{{ route('artist.register') }}" id=""  enctype="multipart/form-data" >
            @csrf
            <section class="login-page-new">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="login-side-img">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('asset_front/images/artwork-logo.png') }}"></a>
                                </div>
                                <img src="{{ asset('asset_front/images/banners/banner-login.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="login-inner-box">
                                <div class="login-inner">
                                    <h2 class="sign-up">Sign Up</h2>
                                    <h6>Create your account to start the service</h6>
                                    <div class="inner-form-box">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Enter Name" id="name" type="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Username (Email)" id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <select class="form-control valid" name="country_code">
                                                                <option>+91</option>
                                                                <option>+221</option>
                                                                <option>+00</option>
                                                                <option>+12</option>
                                                            </select>
                                                        </div>
                                                        <input placeholder="Enter mobile" id="mobile" type="text" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus minlength="10" maxlength="10" >
                                                    </div>
                                                </div>
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                @error('country_code')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Awards and Achievements" id="award_achievement" type="text" class="form-control form-control-lg @error('award_achievement') is-invalid @enderror" name="award_achievement" value="{{ old('award_achievement') }}"  autocomplete="award_achievement" autofocus>
                                                </div>
                                                @error('award_achievement')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Enter Instgram Id" id="insta_id" type="text" class="form-control form-control-lg @error('insta_id') is-invalid @enderror" name="insta_id" value="{{ old('insta_id') }}"  autocomplete="insta_id" autofocus>
                                                </div>
                                                @error('insta_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Enter Facebook Id" id="fb_id" type="text" class="form-control form-control-lg @error('fb_id') is-invalid @enderror" name="fb_id" value="{{ old('fb_id') }}"  autocomplete="fb_id" autofocus>
                                                </div>
                                                @error('fb_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                     <input placeholder="Enter Reffered By" id="referred_by" type="text" class="form-control form-control-lg @error('referred_by') is-invalid @enderror" name="referred_by" value="{{ old('referred_by') }}"  autocomplete="referred_by" autofocus>
                                                </div>
                                                @error('referred_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Enter Password" id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required  autocomplete="password" autofocus>
                                                </div>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Confirm Password" id="" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required name="password_confirmation"  autocomplete="current-password" data-validate-linked="#password" >
                                                </div>
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-0">
                                                    <div class="browse-file-section">
                                                        <input type="file" name="signature_image" class="file-hidden file">
                                                        <div class="input-group">
                                                            <input type="text"  name="" class="form-control" disabled="" placeholder="Upload Signature">
                                                            <span class="input-group-btn">
                                                            <button class="browse btn input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('signature_image')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-25">
                                                    <input placeholder="Other content" id="" type="text" class="form-control form-control-lg @error('other_content') is-invalid @enderror" name="other_content"  autocomplete="other_content" >
                                                </div>
                                                @error('other_content')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <!-- <div class="checkbox text-left">
                                                  <label>
                                                    <input type="checkbox" id="" data-rule-required="true">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                    <a href="#" class="artist-line" target="_blank">*Terms and Conditions.</a>
                                                  </label>
                                                </div> -->
                                            </div>
                                        </div>
                                        <p class="artist-line">*Artist Certificates of Authenticity require a signature.</p>
                                        <div class="text-center">
                                            <button class="common-btn-new login-btn" type="submit">&nbsp;  Register  &nbsp;</button>
                                            <!-- <button  type="submit"> Register </button> -->
                                            <!-- <div class="not-an-acount">
                                                By signing up, you agree to our   <a href="#">Terms & Conditions</a>.
                                                </div> -->
                                            <div class="not-an-acount">
                                                Already have an Account. <a href="{{ route('artist.login') }}">Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </body>
    <!-- page-wrapper -->
    <script src="{{ asset('asset_front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_front/js/poper.js') }}"></script>
    <script src="{{ asset('asset_front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset_front/js/jquery.validate.min.js') }}"></script>
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script type="text/javascript">
        $('#validate').validate({
            onfocusout: function(element) {
             this.element(element);
             },
            errorClass: 'error_validate',
            errorElement:'span',
            highlight: function(element, errorClass) {
             $(element).removeClass(errorClass);
            },
            submitHandler:function(form)
                {
                  $('#submit_signup').attr('disabled',true);
                  form.submit();
                }
        });
    </script>
    <script>
        $(document).on('click', '.browse', function(){
               var file = $(this).parent().parent().parent().find('.file');
               file.trigger('click');
           });
           $(document).on('change', '.file', function(){
               $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
           });
    </script> 
</html>