@extends('layouts.admin')
@section('content') 
<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-lock-reset"></i>
    </span> Update Profile </h3>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <form action="{{ route('admin.update.profile')}}" method="POST" data-parsley-validate>
                            @csrf
                            <div>
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
                                <div class="profile-form">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="oldPassword" placeholder="Enter Old Password" required>
                                         @if ($errors->has('oldPassword'))
                                         <span class="invalid-feedback">
                                         <strong>{{ $errors->first('oldPassword') }}</strong>
                                         </span>
                                         @endif
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" placeholder="Enter New Password"  id="password" name="password" required>
                                        @if ($errors->has('password'))
                                         <span class="invalid-feedback">
                                         <strong>{{ $errors->first('password') }}</strong>
                                         </span>
                                         @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" data-validate-linked="#password" required>
                                         @if ($errors->has('confirm_password'))
                                         <span class="invalid-feedback">
                                         <strong>{{ $errors->first('confirm_password') }}</strong>
                                         </span>
                                         @endif
                                    </div>
                                    <div class="popup-btn text-center">
                                        <input type="submit" value="Update" class="btn btn-common bg-gradient-primary">
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
@endsection