<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reset Password - VelaTech Dentist</title>
        <link href="{{ asset('admin_assets2/css/styles.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('image_about/20231119052722.png') }}" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-white">
    @include('sweetalert::alert')
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form action="{{ route('forgotpassword.submitResetPasswordForm') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmail">Email</label>
                                                <input class="form-control py-4 @error('email')is-invalid @enderror" name="email" id="inputEmail" type="email" placeholder="Enter email" />
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
         
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputNewPassword">New Password</label>
                                                <input class="form-control py-4 @error('password')is-invalid @enderror" name="password" id="inputNewPassword" type="password" placeholder="Enter new password" />
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputCurrentNewPassword">Confirm New Password</label>
                                                <input class="form-control py-4 @error('confirmpassword')is-invalid @enderror" name="confirmpassword" id="inputCurrentNewPassword" type="password" placeholder="Enter confirm new password" />
                                            </div>
                                            @error('confirmpassword')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                            <!-- Form Group (login box)-->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary text-white" type="submit" >Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a class="text-primary" href="{{ route('login') }}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small text-muted">Copyright &copy; VelaTech Dentist <script>document.write(/\d{4}/.exec(Date())[0])</script></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin_assets2/js/scripts.js') }}"></script>
    </body>
</html>
