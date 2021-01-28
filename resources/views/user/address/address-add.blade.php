@extends('layouts.user')
@section('content') 
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Add New Address </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                <a href="{{ route('user.address.list') }}" class="btn btn-common bg-gradient-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11 m-auto">
                        <div>
                            <form method="post" action="{{ route('user.address.add') }}">
                                @csrf
                                <div class="profile-form mt-20 view-banner-page">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group for-flex-inline">
                                                <label>Type of Address?</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input"  required name="address_name" id="optionsRadios1" value="Home" required> Home <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input"  required name="address_name" id="optionsRadios1" value="Office" required> Office <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input"  required name="address_name" id="optionsRadios1" value="Other" required> Other <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            @error('address_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name* </label>
                                                <input type="text"  required name="first_name" value="{{ old('first_name') }}" class="form-control">
                                            </div>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name* </label>
                                                <input type="text"  required name="last_name" value="{{ old('last_name') }}" class="form-control">
                                            </div>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email ID*</label>
                                                <input type="email"  required name="email" value="{{ old('email') }}" class="form-control">
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile Number*</label>
                                                <input type="text"  required name="mobile" value="{{ old('mobile') }}" class="form-control">
                                            </div>
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pin Code*</label>
                                                <input type="text"  required name="pin_code" value="{{ old('pin_code') }}" class="form-control">
                                            </div>
                                            @error('pin_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State/Province*</label>
                                                <input type="text"  required name="state" value="{{ old('state') }}" class="form-control">
                                                {{-- <div class="box">
                                                    <select class="form-control">
                                                        <option>Nawaj Shekh </option>
                                                        <option>2 </option>
                                                        <option>3 </option>
                                                        <option>4 </option>
                                                        <option>5 </option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City*</label>
                                                <input type="text"  required name="city" value="{{ old('city') }}" class="form-control">
                                                {{-- <div class="box">
                                                    <select class="form-control">
                                                        <option>Nawaj Shekh </option>
                                                        <option>2 </option>
                                                        <option>3 </option>
                                                        <option>4 </option>
                                                        <option>5 </option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Street Address (House No, Building, Street, Area)*</label>
                                                <input type="text" class="form-control"  required name="address" value="{{ old('address') }}">
                                            </div>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Content</label>
                                                <input type="text" class="form-control" name="other_content" value="{{ old('other_content') }}">
                                            </div>
                                            @error('other_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="popup-btn text-center">
                                        <button type="submit" class="btn btn-common bg-gradient-primary">Save</button>
                                        <a href="" class="btn btn-common bg-gradient-primary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content') 
<script type="text/javascript" > 
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#user_profile_image_preview')
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
@endsection