<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Avenys | Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="https://cdn.shopify.com/s/files/1/1738/5031/files/avenys-web-logo-600px_600x.png?v=1614750042">

    <!-- Custom styles for this template-->
    <link href="{{asset('/template/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="page-header text-center mt-5">
                    <h1 class="text-white">AVENYS | Admin - Login</h1>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome <a href="/home" style="text-decoration: none;">Back!</a> </h1>
                                    </div>
                                    @if(session()->has('success'))
                                    <div class="form-signin alert alert-success alert-dismissible fade show" role="alert">
                                        {{session('success')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    @if(session()->has('loginError'))
                                    <div class="form-signin alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('loginError')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <main class="form-signin w-100">
                                        <!-- <h1 class="h3 mb-3 fw-normal text-center">Please login</h1> -->
                                        <form action="/login" method="post" class="user">
                                            @csrf
                                            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

                                            <div class="form-floating mb-4">
                                                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{old('email')}}">
                                                <label for="email">Email address</label>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-4">
                                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                                                <label for="password">Password</label>
                                            </div>

                                            <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                            <!-- <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small> -->
                                            <!-- <p class="mt-2 mb-3 text-muted">&copy; 2017–2022</p> -->
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="/register">Create an Account!</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>