@extends('layouts.artist')
@section('content')
<div class="page-header dash-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
        </span> Dashboard 
    </h3>
</div>
<section class="for-dashboard-boxes">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <a href="painting-list.php">
                        <div class="card-body">
                            <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Total Paintings <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                            </h4>
                            <h2 class="">{{ $totalPaintings }}</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">On Sale <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="">{{ $onSalePainting }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pending Approval <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class=""> {{ $approvedPendingPainting }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Referrals <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class=""> {{ $artistRefferalPoints }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Average Rate Per Painting <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="">50,000</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-2 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('asset_artist/images/other/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Art Cash <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="">{{ $artCashbalance }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section>
    <div class="container-fluid p-0">
        <div class="row personal-info-heading mt-0  align-items-end">
            <div class="col-xl-2  col-lg-3 col-md-3 col-sm-3">
                <div class="custom-space-btw for-flex-remove  another-drop-down  align-items-end mb-15">
                    <div class="for-two-select-in-one mb-0">
                        <div class="for-select-existing-doc">
                            <div class="input-group">
                                <div class="dropdown keep-inside-clicks-open">
                                    <h3 class="small-title">Price</h3>
                                    <button class="dropdwn-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 55px, 0px);">
                                        <div class="for-doc-select">
                                            <div class="checkbox">  
                                                <label>
                                                All
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="for-doc-select">
                                            <div class="checkbox">  
                                                <label>
                                                John Doe - 1235556
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="for-doc-select">
                                            <div class="checkbox">  
                                                <label>
                                                Quest Glt - 1235556
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2  col-lg-3 col-md-3 col-sm-3">
                <div class="custom-space-btw for-flex-remove  another-drop-down  align-items-end mb-15">
                    <div class="for-two-select-in-one mb-0">
                        <div class="for-select-existing-doc">
                            <div class="input-group">
                                <div class="dropdown keep-inside-clicks-open">
                                    <h3 class="small-title">Categories</h3>
                                    <button class="dropdwn-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    All
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 55px, 0px);">
                                        <div class="for-doc-select">
                                            <div class="checkbox">  
                                                <label>
                                                All
                                                <input type="checkbox" value="" name="paintingCategory[]">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        @foreach($paintingCategory as $cat)
                                        <div class="for-doc-select">
                                            <div class="checkbox">  
                                                <label>
                                                {{ $cat->name }}
                                                <input type="checkbox" value="{{ $cat->id }}" name="paintingCategory[]">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ml-auto  col-lg-4 col-md-4 col-sm-4 custom-flex-row for-mobile-search">
                <form class=" response-search mb-15">
                    <div class="input-group search-address-book">
                        <input type="text" class="form-control autocomplete" id="myInput" placeholder="Search" onkeypress="autoSearch(this);">
                        <div class="input-group-append">
                            <button class="btn btn-search" type="button"><img src="{{ asset('asset_artist/images/icons/search-black.png') }}"></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->
<section>
    <div class="container-fluid p-0">
        <div class="row">
            @foreach($data as $value)
            <div class="col-md-6">
                <div class="info-box-certify multiple-certify-inner">
                    <div class="row align-item-center">
                        <div class="col-xl-4 offset-xl-1 col-md-12">
                            <div>
                                <img src="{{ $value->getFirstImage() }}" alt="artist img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="40%">Painting name</td>
                                        <td width="10%">:</td>
                                        <td width="40%">{{ $value->painting_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Production Year</td>
                                        <td>:</td>
                                        <td>{{ $value->year_of_production }}</td>
                                    </tr>
                                    <tr>
                                        <td>Current Location</td>
                                        <td>:</td>
                                        <td>{{ $value->location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dimensions</td>
                                        <td>:</td>
                                        <td>{{ $value->height_width }}</td>
                                    </tr>
                                    <tr>
                                        <td>Artwork Type</td>
                                        <td>:</td>
                                        <td>{{ $value->paintingCategory->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                @if($value->is_approved == 1)
                                <h6 class="pending-line"><b>approve</b> &nbsp;{{ \Carbon\Carbon::parse($value->approved_date)->format('d-m-Y') . " | ". \Carbon\Carbon::parse($value->approved_date)->format('H:i') }} </h6>
                                @else
                                <h6 class="pending-line"><b>Not Approved</b> &nbsp; </h6>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--  <div class="col-md-6">
                <div class="info-box-certify multiple-certify-inner">
                   <div class="row align-item-center">
                      <div class="col-xl-4 offset-xl-1 col-md-12">
                        <div>
                          <img src="{{ asset('asset_artist/images/other/certificate_1578489554249_navaj_art.jpg') }}" alt="artist img" class="img-fluid">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-12">
                        
                        <table class="table">
                          <tbody>
                            <tr>
                              <td width="40%">Painting name</td>
                              <td width="10%">:</td>
                              <td width="40%">see life</td>
                            </tr>
                            <tr>
                              <td>Production Year</td>
                              <td>:</td>
                              <td>2016</td>
                            </tr>
                            <tr>
                              <td>Current Location</td>
                              <td>:</td>
                              <td>indore</td>
                            </tr>
                            <tr>
                              <td>Dimensions</td>
                              <td>:</td>
                              <td>250 x 250 cm</td>
                            </tr>
                            <tr>
                              <td>Artwork Type</td>
                              <td>:</td>
                              <td>painting</td>
                            </tr>
                          </tbody>
                        </table>
                        <div>
                            
                           <h6 class="pending-line"><b>approve</b> &nbsp; 08/Jan/2020 | 1:19 PM</h6>
                        </div>
                      </div>
                    </div>
                </div>
                </div> -->
        </div>
    </div>
</section>
@endsection