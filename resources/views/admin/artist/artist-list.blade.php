@extends('layouts.admin')
@section('content')
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Artist List Details </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="{{ route('admin.artist.add') }}" class="btn btn-common bg-gradient-primary">Add new Artist</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
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
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table" id="artistList">
                    <thead>
                        <tr>
                            <!-- <th width="5%">S.No.</th> -->
                            <th width="10%">Artist Image</th>
                            <th width="10%">Artist Name</th>  
                            <th width="15%">Email Address</th>
                            <th width="10%">Phone Number</th>
                            <th width="8%">Referred By</th>
                            <!-- <th width="7%">Comments</th> -->
                            <th width="10%">All Painting</th>
                            <th width="5%">Approved</th>
                            <th width="5%">Rejected</th>
                            <th width="7%">for Sale</th>
                            <th width="7%"> Status </th>
                            <th width="8%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                        <tr>
                            <!-- <td> {{ $key + 1 }}</td> -->
                            <td>
                                <div class="normal-img">
                                    <img src="{{ $value->profile_image }}">
                                </div>
                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->mobile_number }}</td>
                            <td> {{ $value->refered_by }}</td>
                            <!-- <td>test</td> -->
                            <td>{{ $value->artistAllPaintings() }}</td>
                            <td>{{ $value->artistApprovedPaintings() }}</td>
                            <td>{{ $value->artistRejectedPaintings() }}</td>
                            <td>{{ $value->artistForSalePaintings() }}</td>
                            <td> <button class="changeStatus btn {{ $value->is_active == 1 ? 'btn-info' : 'btn-dark'}} " value="{{ $value->id }}" id="published_{{ $value->id }}"  > {{ $value->is_active == 1 ? 'Active' : 'Inactive'}}  </button> </td>
                            <td>
                                <div class="edit-icons">

                                    <a href="edit-artist.php" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil"></i></a>
                                    <a href="" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $(document).ready( function () {
        $('#artistList').DataTable();
    } );

$(document).on('click', '.changeStatus', function() {
   id = $(this).val();
   $.get("{{ route('admin.artist.change.status') }}", { id }, function(data) {
         if(data.success) {
            status = data.status;
            if(status == 1) 
               $('#published_'+id).removeClass("btn-dark").addClass('btn-info').html('Active')

            else 
               $('#published_'+id).removeClass('btn-info').addClass('btn-dark').html('Inactive')
        }
         else {
           alert("Something went wrong");
        }
   })
});
</script>
@endsection