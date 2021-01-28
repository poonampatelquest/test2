@extends('layouts.artist')
@section('content')
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-home"></i></span> Painting List </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="{{ route('artist.painting.add')}}" class="btn btn-common bg-gradient-primary">Add new Painting</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
         @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if(session('status_err'))
        <div class="alert alert-danger">
            {{ session('status_err') }}
        </div>
        @endif
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select id="-new1" class="form-control paintingName" name="painting_name" onchange="paintingFilter()">
                                <option value="">All Painting  Name</option>
                                @foreach($paintingName as $name)
                                    <option value="{{ $name }}"> {{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select id="select-new2" class="form-control paintinglocation" onchange="paintingFilter()">
                                <option value="">All Location</option>
                                @foreach($location as $value)
                                    <option value="{{ $value }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select id="select-new3" class="form-control paintingCategory" onchange="paintingFilter()">
                                <option value="">All Painting Category</option>
                                 @foreach($paintingCategory as $pc)
                                    <option value="{{ $pc->id }}"> {{ $pc->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select id="select-new4" class="form-control size" onchange="paintingFilter()">
                                <option value="">All Size</option>
                                 @foreach($size as $value)
                                    <option value="{{ $value }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="filterTable">
                <div class="card-body table-responsive">
                    <table class="table" id="paintingTable">
                        <thead>
                            <tr>
                                <th width="5%">S. No.</th>
                                <th width="8%">Image</th>
                                <th width="10%">Painting Name</th>
                                <th width="16%">Year of production</th>
                                <th width="7%">Size</th>
                                <th width="10%">Location</th>
                                <th width="10%">Category</th>
                                <th width="8%">For Sale</th>
                                <th width="8%">Basic Price</th>
                                <th width="8%">Status </th>
                                <th width="8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="normal-img">
                                        <img src="{{ $value->getFirstImage() }}">
                                    </div>
                                </td>
                                <td> {{ $value->painting_name }}</td>
                                <td>{{ $value->year_of_production }}</td>
                                <td>{{ $value->height_width }}</td>
                                <td>{{ $value->location }}</td>
                                <td> {{ $value->paintingCategory->name }}</td>
                                <td>{{ $value->for_sale == 1 ? 'Yes' : 'No' }}</td>
                                <td>{{ $value->basic_price }} </td>
                                <td>@if($value->is_approved == 1)
                                        Approved
                                    @elseif($value->is_approved == 2)
                                        Rejected
                                    @else
                                        Pending
                                    @endif
                                </td>

                                <td>
                                    <div class="edit-icons">
                                        <a href="{{ route('artist.painting.edit', [encrypt($value->id)]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{ route('artist.painting.delete', [encrypt($value->id)]) }}" onclick="return deltePainting()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>
                                    </div>
                                </td>
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
@endsection

@section('script')
<script>
$(document).ready( function () {
      $('#paintingTable').DataTable({
         searching: false,
         LengthChange: false,
         bInfo: false,
         paging: false,
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

function paintingFilter() {
    paintingName = $(".paintingName").val(); 
    paintingCategory = $(".paintingCategory").val(); 
    paintinglocation = $(".paintinglocation").val();
    size = $(".size").val(); 

    $.get("{{ route('artist.painting.list') }}", { paintingCategory, paintingName, paintinglocation, size }, function(resp){
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

    return $('#paintingTable').DataTable({
             searching: false,
             LengthChange: false,
             bInfo: false,
             paging: false,
          });
}

function reinitiateDtable() {

    $('#paintingTable').DataTable().destroy();
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