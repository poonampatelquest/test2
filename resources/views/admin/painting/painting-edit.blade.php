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
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Edit Painting </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="{{ route('admin.painting.list')}}" class="btn btn-common bg-gradient-primary">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@php($painting_commision = empty(auth('admin')->user()->painting_commision) ? $fixInfo->painting_commision : auth('admin')->user()->painting_commision )
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
                                <form action="{{ route('artist.painting.update')}}" method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Main Painting(Size in Pixel 478*520)</label>
                                                <div id="attribute_section_add_main" class="addImages">
                                                    @foreach($data->artistPaintingImages as $key => $image)
                                                    <div id="attribute_section_add" class="attribute_section-add-new {{ $key ? '' : 'removeImage'}}">
                                                        <div class="border-gray document-upload-box artist-img">
                                                            <div class="text-left">
                                                                <div class="uploader-img">
                                                                    <img id="output_image_{{ $key }}" src="{{ $image->name}}" class="m-t-5 painting-main-img" >
                                                                </div>
                                                                <div class="input-group mb-3 mb-3 verification">
                                                                    <!-- <input type="text" class="form-control" readonly="" id="text_img_name" data-rule-required="true" data-msg-required="Please select your Id."> -->
                                                                    <span class="input-group-btn">
                                                                    <span class="btn btn-common bg-gradient-primary btn-file1">
                                                                    Upload 
                                                                    <input class="image_name_{{ $key }}" type="file" id="imgInp6" value="" value="{{ $data->images, old('images') }}" name="images[]" accept="image/*" onchange="preview_image(event, {{ $key }} );">
                                                                    <input type="hidden"/ name="imagesIds[]" value="{{ $image->id }}" id="imageName_{{ $key }}">
                                                                    </span>   
                                                                    </span>
                                                                    <!--  <button class="btn btn-common 
                                                                        bg-gradient-primary removie-icon ml-15" onclick="delete_image(event, {{ $key }} );">
                                                                        
                                                                            <i class="mdi mdi-delete-forever"></i>
                                                                        
                                                                        </button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-20 ml-15">
                                                            @if($key)
                                                            <a  href="javascript:void(0);" id="attribute_cloning" class="btn-clone removeImageBtn" title="Remove">
                                                            <i class="fa fa-minus"></i>
                                                            </a>
                                                            @else
                                                            <a href="javascript:void(0);" class="btn-clone" title="Add" onclick="addImage();">
                                                            <i class="fa fa-plus"></i>
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @endforeach
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
                                                        <input type="text" class="form-control" value="{{ $data->painting_name, old('painting_name') }}" name="painting_name" required >
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
                                                        <input type="text" class="form-control setDate" id="yearOfProduction" value="{{ $data->year_of_production, old('year_of_production') }}" name="year_of_production" readonly="" >
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
                                                            <select class="form-control" name="orientation">
                                                            <option {{ $data->orientation == 'Landscape' ? 'selected' : ''  }}  value="Landscape"> Landscape </option>
                                                            <option {{ $data->orientation == 'Portrait' ? 'selected' : ''  }} value="Portrait"> Portrait </option>
                                                            <option {{ $data->orientation == 'Square' ? 'selected' : ''  }} value="Square"> Square </option>
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
                                                                    <input type="text" onblur="blur_next()" value="{{ $data->painting_height, old('painting_height') }}" name="painting_height" id="d_hight" class="form-control" placeholder="Height" required data-msg-required="Please enter height.">
                                                                    <div class="input-group-append">
                                                                        <div class="box">
                                                                            <select class="form-control" id="height_unit" name="height_unit">
                                                                            <option {{ $data->height_unit == 'CM' ? 'selected' : '' }} value="CM"> CM</option>
                                                                            <option {{ $data->height_unit == 'In' ? 'selected' : '' }} value="In"> In</option>
                                                                            <option {{ $data->height_unit == 'PX' ? 'selected' : '' }} value="PX"> PX</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 p-0">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" onblur="blur_next()" value="{{ $data->painting_width, old('painting_width') }}" name="painting_width" id="d_widht" class="form-control" placeholder="Width" required data-msg-required="Please enter Widht.">
                                                                    <div class="input-group-append">
                                                                        <div class="box">
                                                                            <select class="form-control" data-parsley-equalto="#height_unit" name="width_unit" required="" equalto-message="width uint msut be same as height unit">
                                                                            <option {{ $data->width_unit == 'CM' ? 'selected' : '' }} value="CM"> CM</option>
                                                                            <option {{ $data->width_unit == 'In' ? 'selected' : '' }} value="In"> In</option>
                                                                            <option {{ $data->width_unit == 'PX' ? 'selected' : '' }} value="PX"> PX</option>
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
                                                            <select class="form-control" value="{{ $data->location, old('location') }}" name="location">
                                                            
                                                                <option>Indore</option>
                                                            
                                                                <option>Jaipur</option>
                                                            
                                                                <option>Ujjain</option>
                                                            
                                                            </select>
                                                            
                                                            </div> -->
                                                        <input type="text" class="form-control" id="" value="{{ $data->location, old('location') }}" name="location" required="">
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
                                                            <select class="form-control"  name="type_of_art_work_id" id="typeOfArtWork" required="">
                                                                <option value=""> Select Painting Category </option>
                                                                @foreach($typeOfWork as $type)
                                                                <option {{ $data->type_of_art_work_id == $type->id ? 'selected' : '' }}  value="{{ $type->id }}"> {{ $type->name }}</option>
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
                                                            <select class="form-control" value="{{ $data->painting_category_id, old('painting_category_id') }}" name="painting_category_id" required id="paintingCategory">
                                                                <option value=""> Select Painting Category </option>
                                                                @foreach($category as $type)
                                                                <option {{ $data->painting_category_id == $type->id ? 'selected' : '' }}  value="{{ $type->id }}"> {{ $type->name }}</option>
                                                                @endforeach
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
                                                            <select class="form-control"  name="painting_style_id" id="paintingStyle">
                                                                <option value=""> Select Painting Style </option>
                                                                @foreach($style as $st)
                                                                <option {{ $data->painting_style_id == $st->id ? 'selected' : '' }}  value="{{ $st->id }}"> {{ $st->name }}</option>
                                                                @endforeach
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
                                                            <select class="form-control" value="{{ $data->painting_technique_id, old('painting_technique_id') }}" name="painting_technique_id" id=paintingTechnique>
                                                                <option value=""> Select Painting Technique </option>
                                                                @foreach($technique as $type)
                                                                <option {{ $data->painting_technique_id == $type->id ? 'selected' : '' }}  value="{{ $type->id }}"> {{ $type->name }}</option>
                                                                @endforeach
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
                                                            <input type="radio" class="form-check-input forSale" name="for_sale" id="" value="1" {{ $data->for_sale == 1 ? 'checked' : '' }}> Yes<i class="input-helper"></i></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                            <input type="radio" class="form-check-input forSale"  name="for_sale" id="" value="0" {{ $data->for_sale == 0 ? 'checked' : '' }} > No <i class="input-helper"></i></label>
                                                        </div>
                                                    </div>
                                                    @error('for_sale')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row" id="pricingDetails" {{ $data->for_sale == 0 ? 'style=display:none' : '' }} >
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Basic Price</label>
                                                        <input type="text" class="form-control" value="{{ $data->basic_price, old('basic_price') }}" name="basic_price" id="basicPrice" {{ $data->for_sale == 1 ? 'required' : '' }} >
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
                                                        <input type="text" class="form-control" value="{{ $data->commision_price, old('commision_price') }}" name="commision_price" readonly="" id="commission" {{ $data->for_sale == 1 ? 'required' : '' }}>
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
                                                        <input type="text" class="form-control" value="{{ $data->artist_recieve_price, old('artist_recieve_price') }}" name="artist_recieve_price" readonly="" id="artistPrice" {{ $data->for_sale == 1 ? 'required' : '' }} >
                                                    </div>
                                                    @error('artist_recieve_price')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="row" id="notForSale" {{ $data->for_sale == 1 ? 'style=display:none' : '' }} >
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Would you like to do commissioned work for Clients?</label>
                                                        <select class="form-control"  name="for_commissioned_work" id="forCommissionedWork" {{ $data->for_sale == 0 ? 'required' : '' }}>
                                                            <option value=""> Select Option </option>
                                                            <option {{ $data->for_commissioned_work == 1 ? 'selected' : '' }} value="1"> Yes </option>
                                                            <option {{ $data->for_commissioned_work == 1 ? 'selected' : '' }} value="0"> No </option>
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
                                                        <textarea id="paintingDescription" name="painting_description" class="form-control">{{ $data->painting_description }}</textarea>
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
    
        commisionPercentage = "{{ $painting_commision }}";
    
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
    
            $('#imageName_'+id).removeAttr('name').val('');
    
            var output = document.getElementById('output_image_'+ id);
    
            output.src = reader.result;
    
        }
    
    
    
        reader.readAsDataURL(event.target.files[0]);
    
    }
    
    
    
    var id = 2;
    
    function addImage() {
    
        // console.log(id);
    
        var base_url = "{{ asset('asset_artist/images/other/demo-img.png') }}";
    
        var data = "";
    
        var j = $('.removeImage').length;
    
    
    
        if(j < 7) {
    
    
    
            $.get("{{ route('artist.painting-images')}}", {id }, function(resp) {
    
                $('.addImages').append(resp)
    
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
    
    
    
    function delete_image(event , id) 
    
    {
    
        var output = document.getElementById('output_image_'+ id);
    
        $('.image_name_'+id).val('');
    
        output.src = "{{ asset('asset_artist/images/other/demo-img.png') }}";
    
    }
    
    
    
    
    
    
    
    var countval = 1; //for Increase id num  
    
    function attribute_cloning_add(){
    
        var new_count = countval++; //for increase id number
    
        // both for change id  
    
        $clone1 = $("#attribute_section_add").clone();
    
        $clone1.attr('id','attribute_section_add'+new_count);
    
        $('#attribute_section_add_main').append($clone1); //for append Clone Data
    
        re_arrange_qualification();
    
        
    
    }
    
    
    
</script>
<!-- Remove Clone by Click Minus Button -->
<script>
    function remove_current_div_venues(obj){
    
        var parent_id = obj.parent().parent().attr('id'); //for parent ID
    
        if( parent_id != 'attribute_section_add'){
    
            obj.parent().parent().remove();
    
            re_arrange_qualification(); 
    
        }    
    
    }
    
    
    
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