@extends('layouts.user')
@section('content') 
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Saved Addresses </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                <a href="{{ route('user.address.add.show') }}" class="btn btn-common bg-gradient-primary">Add New Address</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11 m-auto">
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
                        <div>
                            <div class="profile-form mt-20 view-banner-page">
                                <div class="row">
                                    @if(count($data))
                                        @foreach($data as $value)
                                        <div class="col-md-6">
                                            <div class="address-box">
                                            <h4>{{ $value->name }}<span>{{ $value->address_name }}</span></h4>
                                                <div>
                                                    <p> {{ $value->address }} </p>
                                                    <p> {{ ucwords($value->city) }} - {{ $value->city }}</p>
                                                    <p> {{ ucwords($value->state) }} </p>
                                                </div>
                                                <div class="edit-icons text-right">
                                                <a href="{{ route('user.address.edit.show', [ encrypt($value->id) ]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="{{ route('user.address.delete', [ encrypt($value->id) ]) }}" onclick="return deleteAddress()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-close"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-12">
                                            {{-- <div class="address-box"> --}}
                                            <h4> No Address Found. <a href="{{ route('user.address.add.show') }}" >Add One </a> </h4>
                                            {{-- </div> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
<script type="text/javascript"> 
    function deleteAddress(){
        if(confirm('Are you sure you want to delete this address ?')){
            return true;
        }
        return false;
    }
</script>
@endsection