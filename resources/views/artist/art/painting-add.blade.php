@extends('layouts.artist')
@section('content')
<style >
    .ui-datepicker-calendar {
    display: none;
    }​
</style>
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Add Painting </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="{{ route('artist.painting.list')}}" class="btn btn-common bg-gradient-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@php($painting_commision = empty(auth('artist')->user()->painting_commision) ? $fixInfo->painting_commision : auth('artist')->user()->painting_commision )

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if($errors->any())
                        <!-- {!! implode('', $errors->all('<div>:message</div>')) !!} -->
                    @endif
                    <div class="col-md-11 m-auto">
                        <div class="add-painting-form">
                            <div class="profile-form mt-20 view-banner-page">
                                <!-- <form action="{{ route('artist.painting.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate > -->
                                <form action="{{ route('artist.painting.store')}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Main Painting(Size in Pixel 478*520)</label>
                                                <div id="attribute_section_add_main" class="addImages">
                                                    <div id="attribute_section_add" class="attribute_section-add-new ">
                                                        <div class="border-gray document-upload-box artist-img">
                                                            <div class="text-left">
                                                                <div class="uploader-img">
                                                                    <img id="output_image_1" src="{{ asset('asset_artist/images/other/demo-img.png') }}" class="m-t-5 painting-main-img" >
                                                                </div>
                                                                <div class="input-group mb-3 mb-3 verification">
                                                                    <!-- <input type="text" class="form-control" readonly="" id="text_img_name" data-rule-required="true" data-msg-required="Please select your Id."> -->
                                                                    <span class="input-group-btn">
                                                                        <span class="btn btn-common bg-gradient-primary btn-file1">
                                                                        Upload 
                                                                            <input class="image_name_1" type="file" id="imgInp6" value="" value="{{ old('images') }}" name="images[]" accept="image/*" onchange="preview_image(event, 1);" required="">
                                                                        <!-- <input type="hidden" value="{{ old('images') }}" name="images[]" value="" > -->
                                                                        </span>   
                                                                    </span>

                                                                    <!-- <button class="btn btn-common 
                                                                    bg-gradient-primary removie-icon ml-15" onclick="delete_image(event, 1);">
                                                                        <i class="mdi mdi-delete-forever"></i>
                                                                    </button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-20 ml-15">
                                                            <a href="javascript:void(0);" class="btn-clone" title="Add" onclick="addImage();">
                                                            <i class="fa fa-plus"></i>
                                                            </a>
                                                          <!--   <a  href="javascript:void(0);" id="attribute_cloning" class="btn-clone removeImageBtn" title="Remove">
                                                            <i class="fa fa-minus"></i>
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('images')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <h4>Basic Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Painting Name</label>
                                                        <input type="text" class="form-control" value="{{ old('painting_name') }}" name="painting_name" required >
                                                    </div>

                                                    @error('painting_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Year Of Production</label>
                                                        <input type="text" class="form-control setDate" id="yearOfProduction" value="{{ old('year_of_production') }}" name="year_of_production" readonly="" >
                                                    </div>
                                                    @error('year_of_production')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Orientation</label>
                                                        <div class="box">
                                                            <select class="form-control" value="{{ old('orientation') }}" name="orientation">
                                                                <option value="Landscape"> Landscape </option>
                                                                <option value="Portrait"> Portrait </option>
                                                                <option value="Square"> Square </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('orientation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group for-size">
                                                        <label>Size(Height*Width)</label>
                                                        <div class="row m-0">
                                                            <div class="col-md-6 p-0">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" onblur="blur_next()" value="{{ old('painting_height') }}" name="painting_height" id="d_hight" class="form-control" placeholder="Height" required data-msg-required="Please enter height.">
                                                                    <div class="input-group-append">
                                                                        <div class="box">
                                                                            <select class="form-control" id="height_unit" value="{{ old('height_unit') }}" name="height_unit">
                                                                                <option>CM</option>
                                                                                <option>In</option>
                                                                                <option>PX</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 p-0">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" onblur="blur_next()" value="{{ old('painting_width') }}" name="painting_width" id="d_widht" class="form-control" placeholder="Width" required data-msg-required="Please enter Widht.">
                                                                    <div class="input-group-append">
                                                                        <div class="box">
                                                                            <select class="form-control" value="{{ old('width_unit') }}" data-parsley-equalto="#height_unit" name="width_unit" required="" equalto-message="width uint msut be same as height unit">
                                                                                <option>CM</option>
                                                                                <option>In</option>
                                                                                <option>PX</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('painting_height')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                   @error('height_unit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    @error('painting_width')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                   @error('width_unit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <!-- <div class="box">
                                                            <select class="form-control" value="{{ old('location') }}" name="location">
                                                                <option>Indore</option>
                                                                <option>Jaipur</option>
                                                                <option>Ujjain</option>
                                                            </select>
                                                        </div> -->
                                                        <input type="text" class="form-control" id="" value="{{ old('location') }}" name="location" required="">
                                                   
                                                    </div>
                                                    @error('location')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Type Of Artwork</label>
                                                        <div class="box">
                                                            <select class="form-control" value="{{ old('type_of_art_work_id') }}" name="type_of_art_work_id" id="typeOfArtWork" required="">
                                                                <option value=""> Select Painting Category </option>
                                                                @foreach($typeOfWork as $type)
                                                                <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('type_of_art_work_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Category</label>
                                                        <div class="box">
                                                            <select class="form-control" value="{{ old('painting_category_id') }}" name="painting_category_id" required id="paintingCategory">
                                                                <option value=""> Select Painting Category </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('painting_category_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Style</label>
                                                        <div class="box">
                                                            <select class="form-control" value="{{ old('painting_style_id') }}" name="painting_style_id" id="paintingStyle">
                                                                <option value=""> Select Painting Style </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('painting_style_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Technique</label>
                                                        <div class="box">
                                                            <select class="form-control" value="{{ old('painting_technique_id') }}" name="painting_technique_id" id=paintingTechnique>
                                                                <option value=""> Select Painting Technique </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @error('painting_technique_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <h4>Pricing Details</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group for-flex-inline">
                                                        <label>For Sale</label>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input forSale" name="for_sale" id="" value="1" checked="true"> Yes<i class="input-helper"></i></label>
                                                        </div>

                                                         <div class="form-check">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input forSale"  name="for_sale" id="" value="0"> No <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                    @error('for_sale')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" id="pricingDetails">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Basic Price</label>
                                                        <input type="text" class="form-control" value="{{ old('basic_price') }}" name="basic_price" id="basicPrice" required="">
                                                    </div>
                                                    @error('basic_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Commission</label>
                                                        <input type="text" class="form-control" value="{{ old('commision_price') }}" name="commision_price" readonly="" id="commission" required="">
                                                        <span style="font-size: 11px; padding-left: 117px;"> Commission {{ $painting_commision }} %</span>
                                                    </div>
                                                    @error('commision_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>You Get</label>
                                                        <input type="text" class="form-control" value="{{ old('artist_recieve_price') }}" name="artist_recieve_price" readonly="" id="artistPrice" required="">
                                                    </div>
                                                    @error('artist_recieve_price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row" id="notForSale" style="display: none;">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Would you like to do commissioned work for Clients?</label>
                                                        <select class="form-control"  name="for_commissioned_work" id="forCommissionedWork">
                                                            <option value="1"> Yes </option>
                                                            <option value="0"> No </option>
                                                        </select>
                                                    </div>
                                                    @error('for_commissioned_work')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Painting Detail Description (optional)</label>
                                                        <textarea id="paintingDescription" name="painting_description" class="form-control"></textarea>
                                                    </div>
                                                    @error('for_commissioned_work')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="popup-btn text-center">

                                                <input type="submit"  value="Save" class="btn btn-common bg-gradient-primary">
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
    </div>
</div>
@endsection
@section('script')
        <script src="{{ asset('asset_artist/js/dashboard.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function(){
        CKEDITOR.replace('painting_description');
    })
    
    $(document).on('change', '#typeOfArtWork', function() {
        type_of_work_id = $(this).val();
        $.get("{{ route('artist.get-other-attribute-based-on-art-work-type')}}", { type_of_work_id }, function(resp) {
            
            category = resp.category;
            technique = resp.technique;
            style = resp.style;

            categoryOption = '<option value=""> Select Painting Category </option>';
            techniqueOption = '<option value=""> Select Painting Technique </option>';
            styleOption = '<option value=""> Select Painting Style </option>';

            for (var i =  0 ; i < category.length; i++) {
                categoryOption += "<option value='"+ category[i]['id'] +"'> " + category[i]['name'] + " </option>"
            }

            for (var i =  0 ; i < technique.length; i++) {
                techniqueOption += "<option value='"+ technique[i]['id'] +"'> " + technique[i]['name'] + " </option>"
            }

            for (var i =  0 ; i < style.length; i++) {
                styleOption += "<option value='"+ style[i]['id'] +"'> " + style[i]['name'] + " </option>"
            }

            console.log(categoryOption);

            $("#paintingCategory").html(categoryOption);
            $("#paintingStyle").html(styleOption);
            $("#paintingTechnique").html(techniqueOption);
        })
    })

    // ForSale Div
    $(document).on('click', '.forSale', function() {
        val = $(this).val();
        console.log(val);

        if(val == 1) {
            $("#pricingDetails").show();
            $("#notForSale").hide();
            $("#forCommissionedWork").removeAttr('required', true);
            $("#artistPrice").attr('required', true);
            $("#basicPrice").attr('required', true);
            $("#commission").attr('required', true);

        }
        else {

            $("#pricingDetails").hide();
            $("#notForSale").show();
            $("#forCommissionedWork").attr('required', true);
            $("#artistPrice").removeAttr('required');
            $("#commission").removeAttr('required');
            $("#basicPrice").removeAttr('required');
        }

    });

    $(document).on('keyup', '#basicPrice', function() {
        basicPrice = $(this).val();
        commisionPercentage = "{{ $painting_commision}}";
        commission = parseFloat(basicPrice/100 * commisionPercentage);
        artistPrice = parseFloat(basicPrice - commission); 
        $("#artistPrice").val(artistPrice);
        $("#commission").val(commission);


    })

    // Multiple Images 

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

    function delete_image(event , id) 
    {
        var output = document.getElementById('output_image_'+ id);
        $('.image_name_'+id).val('');
        output.src = "{{ asset('asset_artist/images/other/demo-img.png') }}";
    }

    var id = 2;
    function addImage() {
        // console.log(id);
        var base_url = "{{ asset('asset_artist/images/other/demo-img.png') }}";
        var data = "";
        var j = $('.removeImage').length;

        if(j < 7) {

            $.get("{{ route('artist.painting-images')}}", {id }, function(resp) {
                $('.addImages').append(resp);
                id = id + 1;
            } )
        }
        else {
            alert("you can't add more then 6 images");
        }
    }

    $(document).on('click', '.removeImageBtn', function(){

        $(this).parents('.removeImage').remove()
    })
 
    $('#yearOfProduction').datepicker({
      changeMonth: false,
      changeYear: true,
      showButtonPanel: true,
      dateFormat: 'yy',
      onClose: function(dateText, inst) { 
          var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
          $(this).val(year);
          $(this).datepicker('setDate', new Date(year, 0, 1));
      }});
</script>
@endsection