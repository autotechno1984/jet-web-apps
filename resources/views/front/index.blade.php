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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Oswald&family=Poppins:ital,wght@0,200;0,500;1,100&display=swap" rel="stylesheet">
    <title>Shanghai Cobra Lottery</title>
</head>
<body >

<!-- === NAV ==== -->
<header >
    <div class="logo">
        Shanghai-Cobra
    </div>
    <nav>
        <ul>
            <li><a href="#" >HOME</a></li>
            <li><a href="/hadiah">HADIAH</a>

            </li>
            <li><a href="/hasil">HASIL</a></li>
{{--            <li class="sub-menu"><a href="#">COMMUNITY</a>--}}
{{--                <ul>--}}
{{--                    <li><a href="#">LINK</a></li>--}}
{{--                    <li><a href="#">LINK</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
            <li><a href="/live">LIVE</a></li>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" sytle="width:0.7rem;">
                <div class="modal-header" style="background: #aaaaaa">
                    <h5 class="modal-title" id="exampleModalLabel">Login Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="modal-body" style="background: #142F43; font-family: 'Nunito', sans-serif; color:white;">
                        <div class="row" id="userbox">
                            <div class="col-lg-1 col-sm-1">

                            </div>
                            <div class="col-lg-4 col-sm-4" id="usernamelabel">
                                <label for="" class="col-form-label">Username</label>
                            </div>
                            <div class="col-lg-6 col-sm-6" id="usernametext">
                                <div class="input-group" >
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" name="username" id="username" placeholder="Username" class="form-control text-center" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                            </div>
                        </div>
                        <div class="row mt-1" id="passbox">
                            <div class="col-lg-1 col-sm-1">

                            </div>
                            <div class="col-lg-4 col-sm-4" id="passwordlabel">
                                <label for="" class="col-form-label " >Password</label>
                            </div>
                            <div class="col-lg-6 col-sm-6" id="passwordtext">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control text-center" placeholder="Password" aria-label="password" aria-describedby="basic-addon2">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer" style="background: #aaaaaa">
                        {{--                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>--}}
                        <button type="submit" class="btn btn-dark">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<div class="main-banner">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active" >
                        <img src="https://i.ibb.co/bWL2dJq/Shanghai-cobra.jpg" class="d-block w-100" alt="...">


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
<div class="container-fluid" style="background: #091353; padding-bottom: 15px;">
    <div class="container text-center" id="result-number" >

        <h3 class="text-white pt-2 pb-2">Hasil Terakhir : {{ $periode->pasaran ?? '-' }} - Periode : {{ $periode->id ?? '-' }}</h3>
        <h5 style="color:white; font-size:2rem;">{{ (date('Y-m-d', strtotime($periode->tgl_periode))) ?? '-' }}</h5>
        <div class="row" style="font-size:1.3rem;">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <table class="table" style="font-family: 'Oswald', sans-serif; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <thead style=" font-weight: bold; border-bottom: 4px solid gold; background: black; color:white; letter-spacing: 0.3rem; ">
                        <tr>
                            <td colspan="2" style="border-top-left-radius: 20px; border-top-right-radius: 20px; ">4D RESULT</td>
                        </tr>

                    </thead>
                    <tbody style="font-weight: bold; background: white;">
                    <tr >
                        <td style="color:gold; background: #BD1616;">1st Prize</td>
                        <td> {{ $tabelshg->where('kode','sh1')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td style="color:gold; background: #BD1616;">2nd Prize</td>
                        <td> {{ $tabelshg->where('kode','sh2')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td style="color:gold; background: #BD1616;">3rd Prize</td>
                        <td> {{ $tabelshg->where('kode','sh3')->pluck('hasil')->first() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2">
                <table class="table" style="font-family: 'Oswald', sans-serif;  border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <thead style="border-bottom:4px solid gold; background: black; color:white;">
                    <th style="border-top-left-radius: 20px; border-top-right-radius: 20px; letter-spacing: 0.2rem;" colspan="2">Starter Prizes</th>
                    </thead>
                    <tbody style="background: white;">
                    <tr>
                        <td>1.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh4')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh5')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh6')->pluck('hasil')->first() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-5">
                <table class="table" style="font-family: 'Oswald', sans-serif;  border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <thead style="border-bottom: 4px solid gold; background: black; color:white;">
                    <th colspan="6" style="border-top-left-radius: 20px; border-top-right-radius: 20px; letter-spacing: 0.2rem;" >Consolation Prize</th>
                    </thead>
                    <tbody style="background: white;">
                    <tr>
                        <td>1.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh7')->pluck('hasil')->first() }}</td>
                        <td>2.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh8')->pluck('hasil')->first() }}</td>
                        <td>3.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh9')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh10')->pluck('hasil')->first() }}</td>
                        <td>5.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh11')->pluck('hasil')->first() }}</td>
                        <td>6.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh12')->pluck('hasil')->first() }}</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh13')->pluck('hasil')->first() }}</td>
                        <td>8.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh14')->pluck('hasil')->first() }}</td>
                        <td>9.</td>
                        <td style="font-weight: bold"> {{ $tabelshg->where('kode','sh15')->pluck('hasil')->first() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1">

            </div>
        </div>
    </div>

    <div class="container text-center d-flex justify-content-center text-white" id="result-number-other">

    </div>

    <div class="container text-center mt-3 " id="others-results" >
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <table class="table table-bordered" style="background: black; color:white;">
                    <thead>
                    <th colspan="3">
                        Other 4D Result's
                    </th>
                    <tr style="background: white; color:black;">
                        <th>Date</th>
                        <th>Market</th>
                        <th>Results</th>
                    </tr>
                    </thead>
                    <tbody style="background: white;color:black;">
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>


</div>


<div class="container-fluid video-result" style="border-top:5px solid gold; border-bottom:5px solid gold; background: #091353; padding-bottom: 20px; ">
    <div class="container">


    </div>

</div>

<div class="container-fluid">
   <h1 class="text-center font-weight-bold" style="letter-spacing: 0.2rem;">Shanghai Cobra</h1>
</div>
<a href="https://wa.me/+6287886486915" class="whatsapp_float" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
<footer class="w-100 " style="background: #091353; ">

    <h6 class="text-center text-white" style="padding-top:1rem;">Shanghai-Cobra &copy;2019 Copyright</h6>
    <div class="text-center pb-3" >
        <span><a href="#"><i class="fab fa-instagram fa-2x" style="color:white; margin-right: 10px;" ></i></a></span>
        <span><a href="#"><i class="fab fa-facebook fa-2x" style="color:white; margin-right: 10px;"></i></a></span>
        <span><a href="https://www.youtube.com/channel/UCgcS0s_l_w7D5jZpifBxVqA"><i class="fab fa-youtube fa-2x" style="color:white; margin-right:10px;"></i></a></span>
        <span><a href=""><i class="fab fa-tiktok fa-2x" style="color:white;"></i></a></span>
    </div>
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
