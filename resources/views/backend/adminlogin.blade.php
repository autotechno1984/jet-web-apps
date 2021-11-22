<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grand-Shanghai | Admin-login page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/942785f6e0.js" crossorigin="anonymous"></script>
</head>
<body>

        <section class="vh-100" style="background-color: #9d9c9c;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img
                                        src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg"
                                        alt="login form"
                                        class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                                    />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="{{ route('admin.check') }}" method="post">
                                        @if(Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
                                        @csrf
                                            <div class="d-flex align-items-center mb-3 pb-1">
{{--                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>--}}
                                                <span class="h1 fw-bold mb-0">Grand-Shanghai</span>
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">Admin-Panel Login</h5>

                                            <div class="form-outline mb-4">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="username" class="col-form-label">Username</label>
                                                    </div>
                                                    <div class="col-lg-8">

                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                                            <input type="text" name="username" id="username" placeholder="Username" class="form-control text-center" aria-label="Username" aria-describedby="basic-addon1" value="{{old('username')}}">
                                                        </div>

                                                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                               <div class="row">
                                                   <div class="col-lg-4">
                                                       <label for="password" class="col-form-label">Password</label>
                                                   </div>
                                                   <div class="col-lg-8">
                                                       <div class="input-group">
                                                           <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                                           <input type="password" name="password" id="password" class="form-control text-center" placeholder="Password" aria-label="password" aria-describedby="basic-addon2" value="{{ old('password') }}">
                                                       </div>
                                                       <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                                   </div>
                                               </div>
                                            </div>


                                            <div class="pt-1 mb-4">
                                               <div class="row">
                                                   <div class="col-lg-4"></div>
                                                   <div class="col-lg-8">
                                                       <button class="form-control btn-dark" type="submit">Login</button>
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
        </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
