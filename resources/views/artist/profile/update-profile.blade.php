@extends('layouts.artist')
@section('content') 
<link href="{{ asset('asset_front/css/custom-new.css') }}" rel="stylesheet"/>
<link href="{{ asset('asset_front/css/custom-new-art.css') }}" rel="stylesheet"/>
<style type="text/css"></style>
<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-lock-reset"></i>
    </span> Update Profile </h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <form action="{{ route('artist.update.profile')}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                            @csrf
                            <div>
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
                                <div class="profile-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Name </label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required value="{{ $data->name, old('name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                          
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Enter New Password"  id="" name="email" value="{{ $data->email, old('email') }}" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <select class="form-control valid" name="country_code">
                                                            <option {{ $data->country_code == '+91' ? 'selected' : '' }} value="+91">+91</option>
                                                            <option {{ $data->country_code == '+221' ? 'selected' : '' }} value="+221">+221</option>
                                                            <option {{ $data->country_code == '+00' ? 'selected' : '' }} value="+00">+00</option>
                                                            <option {{ $data->country_code == '+12' ? 'selected' : '' }} value="+12">+12</option>
                                                        </select>
                                                    </div>
                                                    <input placeholder="Enter mobile" id="mobile" type="text" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="mobile" autofocus minlength="10" maxlength="10" value="{{ $data->mobile, old('mobile') }}">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Facebook Id</label>
                                                <input type="url" class="form-control" placeholder="Enter Facebook Id"  id="" name="fb_id" value="{{ $data->fb_id, old('fb_id') }}">
                                                @error('fb_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Instagram Id</label>
                                                <input type="url" class="form-control" placeholder="Enter Instagram Id"  id="" name="insta_id" value="{{ $data->insta_id, old('insta_id') }}">
                                                @error('insta_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Awards and Achivevements</label>
                                                <textarea rows="4" class="form-control" id="" name="award_achievement">{{ $data->award_achievement, old('award_achievement') }}</textarea>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- <div class="form-group">
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
                                            @enderror -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="browse-file-section">
                                                   <div class="uploader-img">
                                                        <img id="output_image_1" src="{{ $data->profile_image }}" class="m-t-5 painting-main-img" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="browse-file-section">
                                                    <input type="file" name="profile_image" class="file-hidden file" accept="image/*" onchange="preview_image(event, 1);">
                                                    <div class="input-group">
                                                        <input type="text"  name="" class="form-control" disabled="" placeholder="Upload Profile Image" >
                                                        <span class="input-group-btn">
                                                        <button class="browse btn input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-group">
                                                <div class="browse-file-section">
                                                   <div class="uploader-img signature_image">
                                                        <img id="output_image_2" src="{{ $data->signature_image }}" class="m-t-5 painting-main-img" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="browse-file-section">
                                                    <input type="file" name="signature_image" class="file-hidden file" accept="image/*" onchange="preview_image(event, 2);">
                                                    <div class="input-group">
                                                        <input type="text"  name="" class="form-control" disabled="" placeholder="Upload Signature Image" >
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> About (Content) </label>
                                                <textarea rows="4" type="text" class="form-control" name="other_content" placeholder="" required>{{ $data->other_content, old('name') }}</textarea>
                                                @error('other_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="popup-btn text-center">
                                        <input type="submit" value="Update" class="btn btn-common bg-gradient-primary">
                                        <a href="" class="btn btn-common bg-gradient-primary">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
        <script src="{{ asset('asset_artist/js/dashboard.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
    
    $(document).ready(function(){
        CKEDITOR.replace('other_content');
    })
    <script>
        function preview_image(event , id) 
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image_'+ id);
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        }
        $(document).on('click', '.browse', function(){
               var file = $(this).parent().parent().parent().find('.file');
               file.trigger('click');
           });
           $(document).on('change', '.file', function(){
               $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
           });
    </script> 
@endsection