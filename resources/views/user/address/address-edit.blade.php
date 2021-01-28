@extends('layouts.user')
@section('content') 
<div class="heading-row mb-20">
    <div class="row align-item-center">
        <div class="col-lg-6">
            <h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account-plus"></i></span> Add New Address </h3>
        </div>
        <div class="col-lg-6">
            <div class="text-right">
                <div>
                    <a href="{{ route('user.address.list') }}" class="btn btn-common bg-gradient-primary">Go Back</a>
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
                            <form action="{{ route('user.address.edit') }}" method="post">
                                <div class="profile-form mt-20 view-banner-page">
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group for-flex-inline">
                                                <label>Type of Address?</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="address_name"  required id="optionsRadios1" {{ $data->address_name == 'Home' ? 'checked' : '' }} value="Home" required> Home <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="address_name" required id="optionsRadios1" {{ $data->address_name == 'Office' ? 'checked' : '' }} value="Office" required> Office <i class="input-helper"></i></label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="address_name" required id="optionsRadios1" {{ $data->address_name == 'Other' ? 'checked' : '' }} value="Other" required> Other <i class="input-helper"></i></label>
                                                </div>
                                            </div>
                                            @error('address_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name* </label>
                                                <input type="text" name="first_name" value="{{ $data->first_name, old('first_name') }}" required class="form-control">
                                            </div>
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Last Name* </label>
                                                <input type="text" name="last_name" value="{{ $data->last_name, old('last_name') }}" required class="form-control">
                                            </div>
                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email ID*</label>
                                                <input type="email" name="email" value="{{ $data->email, old('email') }}" required class="form-control">
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mobile Number*</label>
                                                <input type="text" name="mobile" value="{{ $data->mobile, old('mobile') }}" required class="form-control">
                                            </div>
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Pin Code*</label>
                                                <input type="text" name="pin_code" value="{{ $data->pin_code, old('pin_code') }}" required class="form-control">
                                            </div>
                                            @error('pin_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>State/Province*</label>
                                                <input type="text" name="state" value="{{ $data->state, old('state') }}" required class="form-control">
                                                {{-- <div class="box">
                                                    <select class="form-control">
                                                        <option>Nawaj Shekh </option>
                                                        <option>2 </option>
                                                        <option>3 </option>
                                                        <option>4 </option>
                                                        <option>5 </option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City*</label>
                                                <input type="text" name="city" value="{{ $data->city, old('city') }}" required class="form-control">
                                                {{-- <div class="box">
                                                    <select class="form-control">
                                                        <option>Nawaj Shekh </option>
                                                        <option>2 </option>
                                                        <option>3 </option>
                                                        <option>4 </option>
                                                        <option>5 </option>
                                                    </select>
                                                </div> --}}
                                            </div>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Street Address (House No, Building, Street, Area)*</label>
                                                <input type="text" class="form-control" name="address" value="{{ $data->address, old('address') }}" required> 
                                            </div>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Other Content</label>
                                                <input type="text" class="form-control" name="other_content" value="{{ $data->other_content, old('other_content') }}"> 
                                            </div>
                                            @error('other_content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="popup-btn text-center">
                                        <button type="submit" class="btn btn-common bg-gradient-primary">Update</button>
                                        <a href="" class="btn btn-common bg-gradient-primary">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
