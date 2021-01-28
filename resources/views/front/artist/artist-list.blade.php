@extends('layouts.front')
@section('content')
<section class="artist-main-page-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-20">
                    <h3 class="main-home-heading">Our Artists</h3>
                </div>
            </div>
                <div class="col-lg-3 col-md-6">
                    <form id="searchForm" action="{{ route('front.artist.list') }}">
                    <div class="input-group search-input-box mb-3">
                        <input type="text" name="searchByName" id="searchuniByname" class="form-control" placeholder="Search By Name">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
        <div class="row" id="undiv">'
            @foreach($data as $value)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('front.artist.detail', [ $value->name, encrypt($value->id) ] ) }}">
                        <div class="artist-box-main">
                            <div class="art-work-img">
                                <img src="{{ $value->artistBackgroundImage() }}">
                            </div>
                            <div class="artist-img">
                                <img src="{{ $value->profile_image }}">
                            </div>
                            <div class="artist-details">
                                <h4 id="abc123"> {{ ucwords($value->name) }}</h4>
                                <div class="for-speciality">
                                    <span><img src="{{ asset('asset_front_side/images/other/tick.png ') }}"> Acclaimed Artist</span>
                                    <span><img src="{{ asset('asset_front_side/images/other/tick.png ') }}"> One to Watch</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('script')
    <script type="text/javascript">
    $(document).on('click','#basic-addon2', function() 
    {
        $("#searchForm").submit();
    })
    </script>
@endsection