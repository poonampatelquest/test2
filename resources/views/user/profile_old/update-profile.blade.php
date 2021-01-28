@extends('layouts.front')
@section('content')
<section class="steps-fill-sec">
  <div class="container-fluid p-0 upper-list-step-row">
      <div class="row">
        <div class="col-md-12">
          <div class="list-steps">
            <ul>
                <h3 class="gredient-text mb-4">Update Your Profile </h3>
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
    <form  action="{{ route('update.profile') }}" id="validate" method="post"  enctype='multipart/form-data'> 
      <div class="row img-upload-row">
        <div class="col-md-4">
            @csrf
          <div class="border-gray document-upload-box">
             <div class="text-center">
                <div class="uploader-img">
                   <img id="user_profile_image_preview" src="{{ $data->profile_image }}" class="m-t-5" >
                </div>

                 <div class="input-group verification">
                    <input type="text" class="form-control"  readonly="" id="text_img_name" data-rule-required="true" data-msg-required="Please select your Id.">
                    <span class="input-group-btn">
                        <span class="btn common-btn btn-file1">
                    Upload <input type="file" id="imgInp6" value="" name="profile_image" accept="image/*" onchange="readURL(this);" >
                     <input type="hidden" name="old_image" value="">
                    </span>
                    </span>
                   <span for="imgInp6" class="error_validate" id="err_image1"></span>
                             </div>
                         </div>
                     </div>
            </div>

        <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputPassword1">Your Name</label>
                   <input type="text" class="form-control" name="name" id="Name" placeholder="Enter Name"  value="{{ $data->name }}" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                <label for="exampleInputPassword1"> Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email" id="Email" placeholder="Enter Name" value="{{ $data->email }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
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
    </form>
  </div>
</section>

@endsection

@section('script')
        <script type="text/javascript" > 
  function readURL(input) {
  if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    
    // alert( $(input).closest('div').parent().children().children().attr('id'))
var img_id = $(input).closest('div').parent().children().children().attr('id')
  // $('#user_profile_image_preview')
  $(`#${img_id}`)
  .attr('src', e.target.result)
  .width(200)
  .height(150);
  };

  reader.readAsDataURL(input.files[0]);
  }
  var src = $('#imgInp6').val(); // "static/images/banner/blue.jpg"
  var tarr = src.split('/');      // ["static","images","banner","blue.jpg"]
  var file = tarr[tarr.length-1]; // "blue.jpg"
  var data = file.split('.')[0];  // "blue"

  //alert(data);
  $('#text_img_name').val(src);
  }
</script>

@endsection