@extends('layouts.admin')
@section('content')
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-home"></i></span> Painting List </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                 <div class="col-md-6">
                                    <b> Painting Name  </b> <br>
                                    <b> Orientation  </b> <br>
                                    <b> Painting Dimension  </b> <br>
                                    <b> Location  </b> <br>
                                    <b> Basic Price  </b> <br>
                                    <b> Commision Precentage  </b> <br>
                                    <b> Basic Price  </b> <br>
                                    <b> Artist Recieve Price  </b> <br>
                                    <b> Is For Commissioned Work ?  </b> <br>
                                </div>
                                <div class="col-md-6">
                                    {{ $data->painting_name }} <br>
                                    {{ $data->orientation }} <br>
                                    {{ $data->height_width }} <br>
                                    {{ $data->location }} <br>
                                    {{ $data->basic_price }} <br>
                                    {{ $data->commision_precentage }} <br>
                                    {{ $data->commision_price }} <br>
                                    {{ $data->artist_recieve_price }} <br>
                                    {{ $data->for_commissioned_work == 1 ? 'Yes' : "No" }} <br>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <b> Artist Name </b> <br> 
                                    <b> Year of Production </b> <br> 
                                    <b> Type of Work </b> <br>
                                    <b> Painting Category </b> <br>
                                    <b> Painting Style </b> <br>
                                    <b> Painting Technique </b> <br>
                                    <b> For Sale </b> <br>
                                    <b> Approved Date  </b> <br>
                                    <b> Is Approved </b> <br>
                                </div>
                                <div class="col-md-6">
                                    {{ $data->artist->name }} <br>
                                    {{ $data->typeOfArtWork->name }} <br>
                                    {{ $data->paintingCategory->name }} <br>
                                    {{ $data->paintingStyle->name }} <br>
                                    {{ $data->paintingTechnique->name }} <br>
                                    {{ $data->for_sale == 1 ? 'Yes' : 'No' }} <br>
                                    {{ $data->approved_date }} <br>

                                    @if($data->is_approved == 1)
                                        @php($status = 'Approved')
                                    @elseif($data->is_approved == 2)
                                        @php($status = 'Rejected')
                                    @else
                                        @php($status = 'Pending')
                                    @endif
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <span id="status_current{{ $data->id }}"> {{ $status }} </span>
                                        </button>
                                        <div class="dropdown-menu">
                                             @if($data->is_approved == 0)
                                                <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $data->id }}" id="status_app{{ $data->id }}" href="javascript:void(0);">Approve</a>
                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $data->id }}" id="status_rej{{ $data->id }}" href="javascript:void(0);">Reject</a>
                                            @elseif($data->is_approved == 1)
                                                 <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $data->id }}" id="status_app{{ $data->id }}" href="javascript:void(0);" style="display: none;">Approve</a>

                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $data->id }}"id="status_rej{{ $data->id }}"  href="javascript:void(0);">Reject</a>
                                            @else
                                                <a class="dropdown-item changePaintingStatus" data-value="1" data-id="{{ $data->id }}" id="status_app{{ $data->id }}" href="javascript:void(0);">Approve</a>
                                                <a class="dropdown-item changePaintingStatus" data-value="2" data-id="{{ $data->id }}" id="status_rej{{ $data->id }}" href="javascript:void(0);" style="display: none;" >Reject</a>
                                            @endif 
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                 <div class="col-md-3">
                                    <b> Description  </b> <br>
                                </div>
                                <div class="col-md-9">
                                    {!! $data->painting_description !!} <br>
                                 </div>
                            </div>
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
                                <th width="8%"> Created Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->artistPaintingImages as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <div class="normal-img">
                                        <img src="{{ $value->name }}">
                                    </div>
                                </td>
                                <td> {{ $value->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>            
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
    });
      // initiateDtable();
});

function paintingFilter() {
    paintingName = $(".paintingName").val(); 
    paintingCategory = $(".paintingCategory").val(); 
    paintinglocation = $(".paintinglocation").val();
    size = $(".size").val(); 

    $.get("{{ route('admin.painting.list') }}", { paintingCategory, paintingName, paintinglocation, size }, function(resp){
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

$(document).on('click', ".changePaintingStatus", function(){
    value = $(this).attr('data-value');
    id = $(this).attr('data-id');
    $.get("{{ route('admin.change.painting.status') }}", { value, id }, function(done) {

        if(done.success) {
            console.log(done.status);
            console.log(done.status);
            if(done.status == 1) {
                $('#status_current'+id).html("Approved")
                $('#status_app'+id).hide()
                $('#status_rej'+id).show()
            }

            if(done.status == 2) {
                $('#status_current'+id).html("Rejected")
                $('#status_app'+id).show()
                $('#status_rej'+id).hide()
            }
        }else {
            alert("Something went wrong. Please try again later");
        }

    })
}) 


</script>

@endsection
