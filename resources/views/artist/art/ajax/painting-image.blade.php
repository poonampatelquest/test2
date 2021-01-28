<div id="attribute_section_add" class="attribute_section-add-new removeImage ">
    <div class="border-gray document-upload-box artist-img">
        <div class="text-left">
            <div class="uploader-img">
                <img id="output_image_{{ $id }}" src="{{ asset('asset_artist/images/other/demo-img.png') }}" class="m-t-5 painting-main-img" >
            </div>
            <div class="input-group mb-3 mb-3 verification">
                <!-- <input type="text" class="form-control" readonly="" id="text_img_name" data-rule-required="true" data-msg-required="Please select your Id."> -->
                <span class="input-group-btn">
                    <span class="btn btn-common bg-gradient-primary btn-file1">
                        Upload 
                        <input class="image_name_{{ $id }}" type="file" id="imgInp6" value="" name="images[]" required accept="image/*" onchange='preview_image(event, {{ $id }} );'>
                    <!-- <input type="hidden" name="images[]" value="" required=""> -->
                    </span>   
                </span>

               <!--  <button class="btn btn-common bg-gradient-primary removie-icon ml-15" onclick="delete_image(event, {{ $id }} );"> 
                    <i class="mdi mdi-delete-forever"></i>
                </button> -->
            </div>
        </div>
    </div>
    <div class="mt-20 ml-15">
       <!--  <a href="javascript:void(0);" class="btn-clone" title="Add" onclick="addImage();">
        <i class="fa fa-plus"></i>
        </a> -->
        <a  href="javascript:void(0);" id="attribute_cloning" class="btn-clone removeImageBtn" title="Remove">
        <i class="fa fa-minus"></i>
        </a>
    </div>
</div>