<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('/css/front.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/942785f6e0.js" ></script>
    <title>GrandSanghai Lottery</title>
</head>
<body>

<!-- === NAV ==== -->
<header >
    <div class="logo">
        GRAND-SHANGHAI
    </div>
    <nav>
        <ul>
            <li><a href="#" >HOME</a></li>
            <li><a href="#">GAMES</a></li>
            <li class="sub-menu"><a href="#">PRIZE</a>
                <ul>
                    <li><a href="#">LINK</a></li>
                    <li><a href="#">LINK</a></li>
                </ul>
            </li>
            <li><a href="#">RESULTS</a></li>
            <li class="sub-menu"><a href="#">COMMUNITY</a>
                <ul>
                    <li><a href="#">LINK</a></li>
                    <li><a href="#">LINK</a></li>
                </ul>
            </li>
            <li><a href="#">ABOUT-US</a></li>
            <li><a href="#">CONTACT</a></li>
            <li><a href="#">ENG</a>
                <ul>
                    <li><a href="#">IND</a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:black; font-weight:500; border: 1px solid yellow; background:#e6e600; padding-bottom: 0;">LOGIN</a>
            </li>
        </ul>
    </nav>
    <div class="menu-toggle">
        <i class="fas fa-bars fa-1x"></i>
    </div>

    {{--    Modal--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="modal-body" style="background: #4d94ff;">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label for="" class="col-form-label">Username</label>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="text" name="username" id="username" placeholder="Username" class="form-control text-center">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-lg-6 col-sm-6">
                                <label for="" class="col-form-label">Password</label>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <input type="password" name="password" id="password" class="form-control text-center" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        {{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>--}}
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<div class="main-banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://i.ibb.co/N9sJqys/c5eb1e9c74934144ac751bc96f885522.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.ibb.co/zbykx3K/1c60701987064b7abc83df449554081f.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.ibb.co/zbqc542/Micro-Gaming-Imgur.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
{{-- Grand Shanghai Result--}}
<div class="container text-center" id="result-number">
    <h1>Today`s Result</h1>
    <div class="row" style="font-size:1.6rem;">
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <table class="table table-bordered">
                <thead>
                <th colspan="2" style="background: #b3d9ff;">4D Result</th>
                </thead>
                <tbody>
                <tr>
                    <td style="color:red; background: #ffb3b3; font-weight: 400;">1st Prize</td>
                    <td style="font-weight: bold; background: #b3d9ff;">2 3 5 0</td>
                </tr>
                <tr>
                    <td style="color:#ffa31a; background: #ffff99; font-weight: 400;">2nd Prize</td>
                    <td style="font-weight: bold; background: #b3d9ff;">7 9 0 0</td>
                </tr>
                <tr>
                    <td style="color:green; background: #b3ffe6; font-weight: 400">3rd Prize</td>
                    <td style="font-weight: bold; background: #b3d9ff;" >9 0 1 2</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2">
            <table class="table table-bordered" style="background: #b3d9ff;">
                <thead>
                <th>Starter Prize</th>
                </thead>
                <tbody>
                <tr>
                    <td style="font-weight: bold">2 3 5 0</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">7 9 0 0</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">9 0 1 2</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-5">
            <table class="table table-bordered" style="background: #b3d9ff;">
                <thead>
                <th colspan="3">Consolation Prize</th>
                </thead>
                <tbody>
                <tr>
                    <td style="font-weight: bold">2 3 5 0</td>
                    <td style="font-weight: bold">4 7 2 9</td>
                    <td style="font-weight: bold">2 2 0 1</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">0 0 9 8</td>
                    <td style="font-weight: bold">7 0 2 0</td>
                    <td style="font-weight: bold">8 0 9 0</td>
                </tr>
                <tr>
                    <td style="font-weight: bold">9 0 1 2</td>
                    <td style="font-weight: bold">7 0 8 1</td>
                    <td style="font-weight: bold">1 5 2 0</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-1">

        </div>
    </div>
</div>

<div class="container text-center d-flex justify-content-center" id="result-number-other">
    <div class="card" style="width:9rem; border:2px solid darkblue; border-radius: 10px; box-shadow: 3px 6px #0b7ec4; margin-right:1rem;">
        <div class="card-header" >
            G-SHANGHAI
        </div>
        <div class="card-body" style="font-size:2rem; color:blue; font-weight: bold; background: #809fff; display: inline-block; padding-top:0px; padding-bottom: 0px; text-shadow: 2px 2px yellow;">
            0 9 2 0
        </div>
        <div class="card-footer" style="font-size:0.9rem;">
            Minggu, 17 Oktober 2021
        </div>
    </div>

    <div class="card" style="width:9rem; border:2px solid darkblue; border-radius: 10px; box-shadow: 3px 6px #0b7ec4; margin-right:1rem;">
        <div class="card-header" >
            HONGKONG
        </div>
        <div class="card-body" style="font-size:2rem; color:blue; font-weight: bold; background: #809fff; display: inline-block; padding-top:0px; padding-bottom: 0px; text-shadow: 2px 2px yellow; ">
            7 1 0 8
        </div>
        <div class="card-footer" style="font-size:0.9rem;">
            Minggu, 17 Oktober 2021
        </div>
    </div>
</div>

<div class="container text-center mt-3 " id="others-results" >
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <table class="table table-bordered" style="background: #4da6ff; color:white;">
                <thead>
                <th colspan="3">
                    Other 4D Result's
                </th>
                <tr>
                    <th>Date</th>
                    <th>Market</th>
                    <th>Results</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
</div>

<div class="container-fluid mt-3 video-result" style="background: #3385ff; padding-bottom: 20px; border-bottom: 2px solid yellow; ">
    <div class="container">
        <h1 class="text-center py-2 text-white">Grand Shanghai Video Results</h1>
        <div class="row" style="background: white; box-shadow: 2px 2px grey;">
            <div class="col-lg-8 mt-3">
                <iframe width="100%" height="600px" src="https://youtube.com/embed/d2KYDIuJBIc">

                </iframe>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </div>
</div>

<footer class="w-100 " style="background: #1a75ff; height: 60px; ">
    <h6 class="text-center text-white" style="padding-top:1rem;">Grand-shanghai &copy;2019 Copyright</h6>
</footer>
{{--https://i.ibb.co/zbqc542/Micro-Gaming-Imgur.jpg--}}
{{--"https://i.ibb.co/zbykx3K/1c60701987064b7abc83df449554081f.png--}}
{{--"https://i.ibb.co/N9sJqys/c5eb1e9c74934144ac751bc96f885522.jpg--}}

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('nav').toggleClass('active')
        })
        $('ul li').click(function(){
            $(this).siblings().removeClass('active');
            $(this).toggleClass('active');
        })
    })
</script>
<script type="text/javascript">

</script>

</body>
</html>
