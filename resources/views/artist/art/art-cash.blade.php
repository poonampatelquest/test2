@extends('layouts.artist')
@section('content')
<div class="page-header dash-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-file-image"></i>
        </span> Art Cash 
    </h3>
</div>
<section class="mt-15">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs art-cash-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="art1" data-toggle="tab" href="#art-cash1" role="tab" aria-controls="art-cash1" aria-selected="true">Summary</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="art2" data-toggle="tab" href="#art-cash2" role="tab" aria-controls="art-cash2" aria-selected="false">Rewards</a>
                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link" id="art3" data-toggle="tab" href="#art-cash3" role="tab" aria-controls="art-cash3" aria-selected="false">How To Earn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="art4" data-toggle="tab" href="#art-cash4" role="tab" aria-controls="art-cash4" aria-selected="false">FAQ</a>
                    </li>
                </ul>
                <div class="tab-content art-cash-inner-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="art-cash1" role="tabpanel" aria-labelledby="art1">
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card mt-15">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1" >From</span>
                                                        </div>
                                                        <input type="text" class="form-control fromDate" id="datepicker" placeholder="Date" name="fromDate" onchange="artFilter()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1" >To</span>
                                                        </div>
                                                        <input type="text" class="form-control toDate" id="datepicker1" placeholder="Date" name="toDate" onchange="artFilter()">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select id="select-new2" class="form-control type" onchange="artFilter()">
                                                        <option value=""> Earn and Spend </option>
                                                        <option value="Earn"> Earn</option>
                                                        <option value="Spend"> Spend </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select id="select-new3" class="form-control amountBetween" onchange="artFilter()">
                                                        <option value="">All Amount </option>
                                                        <option value="50"> Between 0 - 50</option>
                                                        <option value="100"> Between 0- 100</option>
                                                        <option value="150"> Between 0 - 150</option>
                                                        <option value="1000"> Between 0 -1000 </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="filterTable">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="artcashTable">
                                                <thead>
                                                    <tr>
                                                        <!-- <th> S. No. </th> -->
                                                        <th> Date </th>
                                                        <th> Particulers </th>
                                                        <th class="text-success"> Eared </th>
                                                        <th class="text-danger"> Spent </th>
                                                        <th> Balance </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $value)
                                                    <tr>
                                                        <!-- <td> 1 </td> -->
                                                        <td> {{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td>
                                                        <td> {{ $value->art_cast_type }}</td>
                                                        <td  class="text-success"> {{ $value->earn_spend == 'earn' ? '+'.$value->art_cash_amount : '' }} </td>
                                                        <td class="text-danger"> {{ $value->earn_spend == 'spend' ? '-'.$value->art_cash_amount : '' }} </td>
                                                        <td> $ {{ $value->balanceLeft($value->created_at, $value->artist_id) }} </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{  $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="art-cash2" role="tabpanel" aria-labelledby="art2">2</div> -->
                    <div class="tab-pane fade" id="art-cash3" role="tabpanel" aria-labelledby="art3">
                        <div class="card mt-15">
                            <div class="card-body card-body-how-earn">
                                <h3>Its Easy to earn Credits in few Simple Steps</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="steps-box">
                                            <img src="{{ asset('asset_artist/images/icons/gift.png') }}">
                                            <h4>Joining Bonus</h4>
                                            <h3>{{ $fixinfo->registration_amount }} Points</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="steps-box">
                                            <img src="{{ asset('asset_artist/images/icons/upload.png') }}">
                                            <h4>Per Painting Upload</h4>
                                            <h3>{{ $fixinfo->painting_upload_amount }} Points</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="steps-box">
                                            <img src="{{ asset('asset_artist/images/icons/refer.png') }}">
                                            <h4>Refer to Other</h4>
                                            <h3>{{ $fixinfo->referral_amount }} Points</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="art-cash4" role="tabpanel" aria-labelledby="art4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mt-15">
                                    <div class="card-body">
                                        <div class="accordion faq-block" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        How the Art will be digitalized ?
                                                        <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                                                        <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                                    <div class="card-body">
                                                        Artist needs to register with us by providing the basic details and uploading their Art for verification. Our system will generate a unique code for each painting. Securely add the unique code on NFC tag by your mobile or computer. Paste the unique code at the back of the art. This is how your Art can get digitalized with the help of blockchain and IoT. And in this way the Art can be secured and certified.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        How the Art is related to the Blockchain technology ?
                                                        <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                                                        <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Making use of Blockchain technology in Art can help the artist to tokenize their work, track ownership and provenance. It helps to authenticate the Art and decentralize the data of the Art. By using Blockchain each Art data can be stored on multiple blocks and person can easily get all the data by just scanning the unique code. Thus Blockchain will help to secure the Art and maintain the uniqueness of the Art.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        How can I buy or sell the art on your site ?
                                                        <span class="inc-icon plus"><i class="fas fa-plus"></i></span>
                                                        <span class="inc-icon minus"><i class="fas fa-minus"></i></span>
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Artist can register with us and then they can post their art with its description and selling price. The Art will have certificate of authentication and a tag which will help to authenticate the Art. And similarly for buying purpose a person can just simply add the Art to the cart and can buy the art by paying the price of the Art. This is a very simple and easy procedure. We will take care of the security and delivery of the valuable Art. You can also gift an Artwork from our website. 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).on('click.bs.dropdown.data-api', '.dropdown.keep-inside-clicks-open', function (e) {
      e.stopPropagation();
    });
    
    $(document).ready( function () {
         $('#artcashTable').DataTable({
            searching: false,
            LengthChange: false,
            bInfo: false,
            paging: false,
            sorting: false,
            // language: {
            //    paginate: {
            //       next: '»', 
            //       previous: '«' 
            //    },
            //    search: '<i class="fa fa-search" aria-hidden="true"></i>'
            // }
         });
         // initiateDtable();
    });
    
    function artFilter() {
       fromDate = $(".fromDate").val(); 
       toDate = $(".toDate").val(); 
       type = $(".type").val();
       amount = $(".amountBetween").val(); 
    
       $.get("{{ route('artist.art.cash') }}", { fromDate, toDate, type, amount }, function(resp){
           $('#filterTable').html(resp);
           reinitiateDtable();
       })
    
    }
    
       $(document).on('click', '.flex a', function(e) {
           e.preventDefault();
    
           $.get($(this).attr('href'), {}, function(response) {
    
               $('#filterTable').html(response);
           });
       });
    
    function initiateDtable() {
    
       return $('#artcashTable').DataTable({
            searching: false,
            LengthChange: false,
            bInfo: false,
            paging: false,
    		sorting: false,
        });
    }
    
    function reinitiateDtable() {
    
       $('#artcashTable').DataTable().destroy();
       initiateDtable();
    }
    
    function deltePainting() {
    
       var result = confirm("Are you sure you wanted to delete this painting?");
    
       if (result == true) {
           return true;
       } 
       else {
           return false;
       }
    } 
    
</script>
@endsection