@extends('layouts.admin')
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
                        <a class="nav-link active" id="art1" data-toggle="tab" href="#art-cash1" role="tab" aria-controls="art-cash1" aria-selected="true">Detail</a>
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
                                                    <select id="-new1" class="form-control artistName" name="artistName" onchange="artFilter()">
                                                        <option value="">All Artist </option>
                                                        @foreach($artistName as $name)
                                                            <option value="{{ $name->id }}"> {{ $name->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <select id="select-new2" class="form-control perticulars" onchange="artFilter()">
                                                        <option value=""> Perticulars </option>
                                                        <option value="refferal"> Refferal</option>
                                                        <option value="registration"> Registration </option>
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
                                                        <th> Artist </th>
                                                        <th> Particulers </th>
                                                        <th class="text-success"> Eared </th>
                                                        <th class="text-danger"> Spend </th>
                                                        <th> Balance </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $value)
                                                    <tr>
                                                        <!-- <td> 1 </td> -->
                                                        <td> {{ \Carbon\Carbon::parse($value->created_at)->format('d M, Y') }}</td>
                                                        <td> {{ $value->artist->name }}</td>
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
       artistName = $(".artistName").val();
       perticulars = $(".perticulars").val();

       $.get("{{ route('admin.art.cash') }}", { fromDate, toDate, type, amount, artistName, perticulars }, function(resp){
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