@extends('layouts.user')
@section('content')
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-home"></i></span> WishList </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
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
            <div id="filterTable">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> Painting Name </th>
                            <th> Painting Image </th>
                            <th> Artist Name </th>
                            <th> Added In-wishlist </th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $value)
                        <tr>
                            <td> {{ $value->artistPainting->painting_name }} </td>
                            <td>
                            <div class="normal-img">
                            <img src="{{ $value->artistPainting->artist->name  }}">
                            </div>
                            </td>
                            <td> {{ $value->artistPainting->artist->name  }} </td>
                            <td>{{ $value->created_at  }}</td>
                        <td><a  class="btn btn-info"  onclick="removeFromWishlist()" href="{{ route('user.remove.from.wishlist', [ encrypt($value->id)]) }}" > Remove From wishlist</a></td>
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

function removeFromWishlist() {

    var result = confirm("Are you sure you wanted to remove this painting from wishlist?");

    if (result == true) {
        return true;
    } 
    else {
        return false;
    }
} 


</script>

@endsection