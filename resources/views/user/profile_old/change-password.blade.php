@extends('layouts.front')
@section('content')
<section class="steps-fill-sec">
  <div class="container-fluid p-0 upper-list-step-row">
      <div class="row">
        <div class="col-md-12">
          <div class="list-steps">
            <ul>
                <h3 class="gredient-text mb-4">Update Passwod </h3>
            </ul>
          </div>
        </div>
      </div>
  </div>
  <div class="container">
   @if (session('status'))
    <div class="alert alert-success mt-3">
       {{ session('status') }}
    </div>
    @endif
    @if(session('status_err'))
    <div class="alert alert-danger mt-3">
       {{ session('status_err') }}
    </div>
    @endif
    <form  action="{{ route('update.password') }}" id="validate" method="post"  enctype='multipart/form-data'> 
        @csrf
      <div class="row img-upload-row">
        <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" class="form-control" name="oldPassword" placeholder="Enter Old Password" required>
                     @if ($errors->has('oldPassword'))
                     <span class="invalid-feedback">
                     <strong>{{ $errors->first('oldPassword') }}</strong>
                     </span>
                     @endif
                </div>
              </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" placeholder="Enter New Password"  id="password" name="password" required>
                    @if ($errors->has('password'))
                     <span class="invalid-feedback">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" data-validate-linked="#password" required>
                     @if ($errors->has('confirm_password'))
                     <span class="invalid-feedback">
                     <strong>{{ $errors->first('confirm_password') }}</strong>
                     </span>
                     @endif
                </div>
              </div>
            </div>
        <div class="row">
          <div class="col-md-12">
            <div class="last-submit-btn text-center">
                <button class="btn common-btn-new"  type="submit">Update</button>
                </div>
          </div>
        </div>
        </div>
        </div>
    </form>
  </div>
</section>

@endsection

@section('script')
<script type="text/javascript">
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Password and confirm password don't match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>
@endsection