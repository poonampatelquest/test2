@extends('layouts.admin')
@section('content')
<style >
    .ui-datepicker-calendar {
    display: none;
    }​
</style>
<div class="heading-row mb-20">
    <div class="row align-item-center">
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
                  
                        <div class="add-painting-form">
                            <div class="profile-form mt-20 view-banner-page">
                                <form action="{{ route('admin.about.us.update')}}" method="post"  >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                    
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" value="{{ $data->title, old('title') }}" name="title" required >
                                                    </div>

                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label> Description </label>
                                                        <textarea id="about_us_description" name="description" class="form-control">{{ $data->description }}</textarea>
                                                    </div>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="popup-btn text-center">

                                                <input type="submit"  value="Update" class="btn btn-common bg-gradient-primary">
                                                <a href="" class="btn btn-common bg-gradient-primary">Cancel</a>
                                            </div>
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
</div>
@endsection
@section('script')
        <script src="{{ asset('asset_artist/js/dashboard.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function(){
        CKEDITOR.replace('description');
    })
</script>
@endsection