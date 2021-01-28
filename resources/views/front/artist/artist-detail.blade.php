@extends('layouts.front')
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
                <a href="/universities">
                <span>Artworks</span>
                </a>
                <span><i class="fas fa-arrow-right"></i></span>
            </li>
            <li>
                <a href="JavaScript:void(0);">
                <span>Artist</span>
                </a>
                <span><i class="fas fa-arrow-right"></i></span>
            </li>
            <li>
                <span>{{ $data->name }}</span>
            </li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h4>Paintings</h4>
                <h2 class="gredient-text">You can view all artworks here</h2>
            </div>
        </div>
    </div>
</section>
<div class="transition">
    <div class="icon-quote"><img src="{{ asset('asset_front_side/images/other/left-quotes-sign.png') }}"></div>
</div>
<section class="artist-bio" id="artist-bio">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5">
                <div class="artist-details">
                    <div class="box-artist-keys">
                        <div class="title">Credentials</div>
                        <ul class="artist-keys">
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Acclaimed Artist</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Market Value</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> One to Watch</li>
                            <li><img src="{{ asset('asset_front_side/images/other/tick.png') }}"> Works on commission</li>
                        </ul>
                    </div>
                    <hr>
                    <a id="social" class="anchor"></a>
                    <div class="artist-share">
                        Share this artist:
                        <ul>
                            <li class="facebook">
                                <a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook"> <i class="icon fab fa-facebook-f"></i></a>
                            </li>
                            <li class="twitter">
                                <a class="tweet" href="javascript:tweetCurrentPage()" target="_blank" alt="Tweet this page">
                                <i class="icon fab fa-twitter"></i></a>
                            </li>
                            <li class="pinterest">
                                <a class="w-inline-block social-share-btn pin" href="" target="_blank" title="Pin it"><i class="icon fab fa-pinterest-p"></i></a>
                            </li>
                            <li class="email">
                                <a class="w-inline-block social-share-btn email" href="" target="_blank" title="Email"><i class="icon fas fa-envelope"></i></a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-md-5 col-sm-7">
                <div class="resume item">
                    {{ $data->any_content }}
                </div>
            </div>
            <div class="col-md-4 col-sm-5 hidden-sm">
                <div class="secondary-picture">
                    <img class="image" src="{{ $data->profile_image }}">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="collection latest even-lst">
    <div class="liner or"></div>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">Latest artworks</div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="outer-box-artist-img for-latest-art">
                    @foreach($data->artistPaintings as $painting)
                    <div class="inner-artist-box">
                        <a href="{{ route('front.artist.painting.detail', [ $data->name, $painting->painting_name, encrypt($painting->id) ] ) }}">
                            <img src="{{ $painting->getFirstImage() }}">
                            <div class="art-actions"><i class="icon far fa-heart"></i></div>
                            <div class="painting-name">
                                {{ $painting->painting_name }}
                            </div>
                        </a>
                    </div>
                    @endforeach
                   <!--  <div class="inner-artist-box">
                        <img src="{{ asset('asset_front_side/images/other/painting4.jpeg') }}">
                        <div class="art-actions"><i class="icon far fa-heart"></i></div>
                        <div class="painting-name">
                            Painting Name
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@endsection