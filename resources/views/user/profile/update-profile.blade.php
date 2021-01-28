@extends('layouts.user')
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
                        <form action="{{ route('user.update.profile')}}" method="POST" data-parsley-validate enctype="multipart/form-data">
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