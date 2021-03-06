<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>The Art W Admin</title>
        <link rel="stylesheet" href="{{ asset('asset_admin/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/vendors/css/vendor.bundle.base.css') }}">
        <link rel="stylesheet" href="{{ asset('asset_admin/css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('asset_admin/images/favicon.png') }}" />
    </head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center auth">
                    <div class="row flex-grow">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left p-5">
                                <h4>Admin Login </h4>
                                
                                <div class="brand-logo">
                                    <img src="{{ asset('asset_admin/images/artwork-logo.png') }}">
                                </div>

                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input placeholder="Enter Email" id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group">
                                        <input placeholder="Password" id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                                    </div>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>  {{ __('Remember Me') }}
                                                <!-- <input type="checkbox" class="form-check-input"> Keep me signed in  -->
                                            </label>
                                        </div>
                                        <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                                    </div>

                                    <div class="mt-3">
                                        <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"  value=" {{ __('Login') }}">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('asset_admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('asset_admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('asset_admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('asset_admin/js/misc.js') }}"></script>
    </body>
</html>