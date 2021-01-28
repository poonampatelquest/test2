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
                    <a href="">
                    <img src="{{ $painting->getFirstImage() }}">
                    </a>
                    <div class="art-actions"><i class="icon far fa-heart"></i></div>
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