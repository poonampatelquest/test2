@extends('layouts.admin')
@section('content')

<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Add Artist Details </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="artist-list.php" class="btn btn-common bg-gradient-primary">Go Back</a>
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
                            <div class="profile-form mt-20 view-banner-page">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Artist Image(Size in Pixel 478*520)</label>
                                            <div class="border-gray document-upload-box artist-img">
                                                <div class="text-left">
                                                    <div class="uploader-img">
                                                        <img id="user_profile_image_preview" src="{{ asset('asset_admin/images/other/user_default.png') }}" class="m-t-5" >
                                                    </div>
                                                    <div class="input-group mb-3 mb-3 verification">
                                                        <input type="text" class="form-control" readonly="" id="text_img_name" data-rule-required="true" data-msg-required="Please select your Id.">
                                                        <span class="input-group-btn">
                                                            <span class="btn btn-common bg-gradient-primary btn-file1">
                                                                Upload <input type="file" id="imgInp6" value="" name="image" accept="image/*" onchange="readURL(this);">
                                                                <input type="hidden" name="old_image" value="">
                                                            </span>   
                                                        </span>
                                                        <button class="btn btn-common bg-gradient-primary ml-15">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group for-flex-inline">
                                                    <label>Want to show this artist on home page?</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> Yes <i class="input-helper"></i></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value=""> No <i class="input-helper"></i></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Select which position the artist should be placed on home page</label>
                                                            <div class="box">
                                                                <select class="form-control">
                                                                    <option>1 Position</option>
                                                                    <option>2 Position</option>
                                                                    <option>3 Position</option>
                                                                    <option>4 Position</option>
                                                                    <option>5 Position</option>
                                                                </select>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Artist Name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email ID</label>
                                                            <input type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Instagram ID</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Facebook ID</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Referred By</label>
                                                            <div class="box">
                                                                <select class="form-control">
                                                                    <option>Nawaj Shekh </option>
                                                                    <option>2 </option>
                                                                    <option>3 </option>
                                                                    <option>4 </option>
                                                                    <option>5 </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Signature Image (Size in Pixel 120*33)</label>
                                                            <input type="file" name="img[]" class="file-upload-default">
                                                            <div class="input-group col-xs-12">
                                                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                                                <span class="input-group-append">
                                                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Other Content</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Artist Description</label>
                                                            <textarea class="form-control" name="editor1"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="popup-btn text-center">
                                            <a href="" class="btn btn-common bg-gradient-primary">Save</a>
                                            <a href="" class="btn btn-common bg-gradient-primary">Cancel</a>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
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

</script>
@endsection