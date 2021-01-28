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
    <link href="{{ asset('asset_front/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('asset_front/css/custom-new.css') }}" rel="stylesheet"/>

    <link href="{{ asset('asset_front/css/custom-new-art.css') }}" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">
   <style type="text/css">
      .error_validate{
        color: red;
      }
      .invalid-feedback {
                color: red;
                display: block !important;
            }
    </style>
</head>
<body>
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
              <div class="login-inner main-login">
                  <h2>Forgot Password</h2>
                  <h6>Enter your Email ID to start the service</h6>
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
                  
                  <form   class="form-wrapper" class="form-wrapper" action="{{ route('artist.forget.password') }}" method="post" id="validate">
                    @csrf
                     <div class="inner-form-box">
                        <div class="for-perticuler-login" style="display: none;">
                         <div class="radio">
                            <label>
                                <input type="radio" name="type_of" value="university"checked>
                                <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                Artist
                            </label>
                        </div>
                      </div>
                      <div class="form-group mb-25">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Email ID*" name="email" id="username" data-rule-required="true" data-msg-required="Please enter Username (Email)." value="{{ old('email') }}">
                      </div>
                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                      <div class="text-center">
                         <button class="common-btn-new login-btn" type="submit">&nbsp;  Submit  &nbsp;</button>

                         <div class="not-an-acount">
                           Dont have an Account?  <a href="{{ route('artist.register') }}">Signup</a>
                         </div>
                      </div>
                     </div>
                  </form>
              </div>
          </div>
       </div>
    </div>
  </div>
</section>



<!-- page-wrapper -->
<script src="{{ asset('asset_front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('asset_front/js/poper.js') }}"></script>
<script src="{{ asset('asset_front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset_front/js/jquery.validate.min.js') }}"></script>

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
</body>

</html>