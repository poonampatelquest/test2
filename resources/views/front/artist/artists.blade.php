@extends('layouts.front')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
    rel="stylesheet" />
@endsection
@section('content')
<section class="dashboard-inner-banner">
    <div class="breadcrb">
        <ol>
            <li>
                <a href="">
                <span>Art for Sale</span>
                </a>
                <span><i class="fas fa-arrow-right"></i></span>
            </li>
            <li>
                <span>Artworks</span>
            </li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h4>Artist</h4>
                <h2 class="gredient-text">You can view all artist here</h2>
            </div>
        </div>
    </div>
    <div class="for-search-heading">
        My Search
    </div>
</section>
<section class="new-main-search">
    <div class="container">
        <div class="row search-row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" name="typefilter" id="typefilter">
                            <option value=""> All Painting Type </option>
                            @foreach($typeOfWork as $pc)
                                <option value="{{ $pc->id }}"> {{ $pc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" name="category" onchange="addfilter()" id="category">
                            <option value=""> All Painting Category </option>
                            @foreach($category as $pc)
                                <option value="{{ $pc->id }}"> {{ $pc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" name="style" onchange="addfilter()" id="style">
                            <option value=""> All Painting Style</option>
                            @foreach($style as $pc)
                                <option value="{{ $pc->id }}"> {{ $pc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" name="technique_id" onchange="addfilter()" id="technique">
                            <option value=""> All Painting Technique </option>
                            @foreach($technique as $pc)
                                <option value="{{ $pc->id }}"> {{ $pc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="filter-main-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="main-heading-box">
                    <div class="title">Price</div>
                    <div class="input-ruler-values">
                        <input type="text" id="amount" readonly>
                        INR
                    </div>
                </div>
                <div id="slider-range" onclick="addfilter()"></div>
            </div>
            <div class="col-md-2">
                <div class="main-heading-box">
                    <div class="title ml-30">Orientation</div>
                    <input type="hidden" id="orientation">
                </div>
                <div class="filter-orientation">
                    <ul>
                        <li><i onclick="orientationValue('landscape')" class="orientation landscape" data-toggle="tooltip"
                            data-placement="top" title="landscape"><span></span></i></li>
                        <li><i onclick="orientationValue('portrait')" class="orientation portrait" data-toggle="tooltip"
                            data-placement="top" title="portrait"><span></span></i></li>
                        <li><i onclick="orientationValue('square')" class="orientation square" data-toggle="tooltip"
                            data-placement="top" title="square"><span></span></i></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="col-md-2">
                <div class="main-heading-box">
                    <div class="title ml-30">Size</div>
                </div>
                <div class="filter-size">
                    <ul>
                        <li><i onclick="addfilter()" class=" small far fa-image" data-toggle="tooltip"
                            data-placement="top" title="Less than 50cm"></i></li>
                        <li onclick="addfilter()"><i class=" medium far fa-image" data-toggle="tooltip"
                            data-placement="top" title="Up to 1m50"></i></li>
                        <li onclick="addfilter()"><i class=" large far fa-image" data-toggle="tooltip"
                            data-placement="top" title="More than 1m50"></i></li>
                    </ul>
                </div>
            </div> --}}
            <div class="col-md-2">
                <div class="main-heading-box">
                    <div class="title">Height</div>
                    <div class="input-ruler-values">
                        <input type="text" id="height">
                        + cm
                    </div>
                </div>
                <div id="height-range" onclick="addfilter()"></div>
            </div>
            <div class="col-md-2">
                <div class="main-heading-box">
                    <div class="title">Width</div>
                    <div class="input-ruler-values">
                        <input type="text" id="width" readonly>
                        + cm
                    </div>
                </div>
                <div id="width-range" onclick="addfilter()"></div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
</section>
<section class="sort-sec">
    <div class="container-fluid">
        <div class="row search-row">
            <div class="col-md-2 offset-md-6">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" id="sort" onchange="addfilter()">
                            <option value="">Sort By</option>
                            <option value="relevence">Relevance</option>
                            <option value="recent">Most Recent</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="box">
                        <select class="form-control" id="perpagesort" onchange="addfilter()">
                            <option value="15">15 Result Per Page</option>
                            <option value="30">30 Result Per Page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="FilterData">
            @foreach($data as $key => $artist)
            <div class="row painting-main-row" id="my-div-full">
                <div class="col-md-12">
                    <div class="outer-box-artist-img">
                        <div class="artis-img-outer">
                            <div class="artist-main-img-box">
                                <div class="thumb">
                                    <a href="{{ route('front.artist.detail', [ $artist->name, encrypt($artist->id) ] ) }}">
                                    <img class="lzy loaded" src="{{ $artist->profile_image }}" alt="Amel Chamandy : contemporary Canadian Painter - Singulart" data-was-processed="true">
                                    </a>
                                </div>
                                <h2>
                                <a href="{{ route('front.artist.detail', [ $artist->name, encrypt($artist->id) ] ) }}">{{ ucwords($artist->name) }}</a>
                                </h2>
                            </div>
                        </div>
                        @foreach($artist->artistPaintings as $key1 => $painting)
                        <div class="inner-artist-box">
                            <a href="{{ route('front.artist.painting.detail', [ $artist->name, $painting->painting_name, encrypt($painting->id) ] ) }}">
                            <img src="{{ $painting->getFirstImage() }}">
                            </a>
                        <div class="art-actions"><i class="icon far fa-heart  addInWishList" data-id="{{ $painting->id }}"></i></div>
                            @if($painting->for_sale == 1)
                                @php($saleStatus = "For Sale")
                            @elseif($painting->for_commissioned_work == 1)
                                @php($saleStatus = "Book for commission")
                            @else
                                @php($saleStatus = "Not For Sale")
                            @endif

                            <span class="for-sale-strip"> {{ $saleStatus }}</span>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="art-detail-left">
                                        <h6 style="font-size:12px">{{ $painting->painting_id }}</h6>
                                        <p>{{ $painting->painting_name }}</p>
                                        <div>
                                            @foreach($painting->artistPaintingImages as $image)
                                            <span>
                                            <img src="{{ $image->name }}">
                                            </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="art-detail-right">
                                        <p>{{ $painting->height_width }}</p>
                                        <h3>₹ {{ $painting->basic_price }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>  
            </div>
            @endforeach
            {{ $data->links() }}
        </div>
        
    </div>
</section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script>
    $(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function (e) {
      e.stopPropagation();
    });

    // $(document).on('click','#basic-addon2', function() 
    // {
    //     $("#searchForm").submit();
    // })
    
    function addfilter() {
        typefilter = $("#typefilter").val();
        perpagesort = $("#perpagesort").val();
        sort = $("#sort").val();
        style_id = $("#style").val();
        technique_id = $("#technique").val();
        category_id = $("#category").val();
        size = $("#size").val();
        orientation = $("#orientation").val();
        amount = $("#amount").val();
        height = $("#height").val();
        width = $("#width").val();

       $.get("{{ route('front.artist.painting.list') }}", { typefilter, perpagesort, sort, amount, style_id, category_id, size, orientation, amount, height, width, technique_id }, function(resp){
           
            $('#FilterData').html(resp);
       })
    }

    function orientationValue(value) {
        $('.orientation').removeClass('active');
        $('.'+value).addClass('active');
        $('#orientation').val(value);
        addfilter()

    }
    
    
       $(document).on('click', '.flex a', function(e) {
            e.preventDefault();
            typefilter = $("#typefilter").val();
            perpagesort = $("#perpagesort").val();
            sort = $("#sort").val();
            style_id = $("#style").val();
            technique_id = $("#technique").val();
            category_id = $("#category").val();
            size = $("#size").val();
            orientation = $("#orientation").val();
            amount = $("#amount").val();
            height = $("#height").val();
            width = $("#width").val();

           $.get($(this).attr('href'), { typefilter, perpagesort, sort, amount, style_id, category_id, size, orientation, amount, height, width, technique_id }, function(response) {
    
               $('#FilterData').html(response);
           });
       });
    
       $(document).on('change', '#typefilter', function() {
        type_of_work_id = $(this).val();
        $.get("{{ route('front.get-other-attribute-based-on-art-work-type')}}", { type_of_work_id }, function(resp) {
            
            category = resp.category;
            technique = resp.technique;
            style = resp.style;

            categoryOption = '<option value=""> All Painting Category </option>';
            techniqueOption = '<option value=""> All Painting Technique </option>';
            styleOption = '<option value=""> ALl Painting Style </option>';

            for (var i =  0 ; i < category.length; i++) {
                categoryOption += "<option value='"+ category[i]['id'] +"'> " + category[i]['name'] + " </option>"
            }

            for (var i =  0 ; i < technique.length; i++) {
                techniqueOption += "<option value='"+ technique[i]['id'] +"'> " + technique[i]['name'] + " </option>"
            }

            for (var i =  0 ; i < style.length; i++) {
                styleOption += "<option value='"+ style[i]['id'] +"'> " + style[i]['name'] + " </option>"
            }

            $("#category").html(categoryOption);
            $('#category').niceSelect('update');
            $("#style").html(styleOption);
            $('#style').niceSelect('update');
            $("#technique").html(techniqueOption);
            $('#technique').niceSelect('update');
            addfilter();

        })
    })

    
</script>
@endsection
<!-- <script src="assets/js/jquery.validate.min.js"></script> -->