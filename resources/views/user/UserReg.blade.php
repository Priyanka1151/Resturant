
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>User Registration</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="{{asset('./css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href=""><img src="{{asset('images/admin/rest.jpg')}}" alt="" width="60px"></a>
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="{{url('user/singup')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>User Name</strong></label>
                                            <input type="text" class="form-control" name="UserName" placeholder="Enter User Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Mobile Number</strong></label>
                                            <input type="text" class="form-control" name="UserMobile" placeholder="Enter Mobile Number" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="Password" placeholder="Enter Password" required>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{url('user/login')}}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('./vendor/global/global.min.js')}}"></script>
<script src="{{asset('./js/custom.min.js')}}"></script>
<script src="{{asset('./js/dlabnav-init.js')}}"></script>

</body>
</html>