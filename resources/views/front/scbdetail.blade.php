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
    <title>GRAND SHANGHAI Lottery</title>
</head>
<body >

<!-- === NAV ==== -->
<header >
    <div class="logo">
        <img src="{{ asset('img/logoshanghai.png') }}" alt="logo grand shanghai">
    </div>
    <nav>
        <ul>
            <li><a href="/" >HOME</a></li>
            <li><a href="/hadiah">HADIAH</a>

            </li>
            <li><a href="/hasil">HASIL</a></li>
            {{--            <li class="sub-menu"><a href="#">COMMUNITY</a>--}}
            {{--                <ul>--}}
            {{--                    <li><a href="#">LINK</a></li>--}}
            {{--                    <li><a href="#">LINK</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
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

{{-- Grand Shanghai Result--}}
<div class="container-fluid" style="background: #091353; text-align: center; color:white;">
    <div class="container">
        <div class="row pt-2">
            <div class="col-lg-1">
                <a href="/hasil" class="btn btn-info">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 class="pt-3">Daftar Keluaran Togel</h3>
                <h3 style="font-weight: bold;">GRAND SHANGHAI</h3>
                <h3 style="color:gold;">Periode {{ $data->id }} - {{ substr($data->pasaran, -5) }}</h3>
                <h3 style="color:gold;">Jam : {{ substr($data->jambuka,0,5) }}.WIB</h3>
                <h3 style="color:gold;">{{\Carbon\Carbon::parse($data->tgl_periode)->locale('id')->dayName.', '. date('d-m-Y', strtotime($data->tgl_periode ))}}</h3>
                <table class="table table-bordered table-striped text-white text-center" id="scb">
                    <thead class="align-middle">
                    <tr>
                      <th>Periode</th>
                      <th>Kategori</th>
                      <th>Nomor</th>
                    </tr>

                    </thead>
                    <tbody>
                        @foreach($tabelhasil as $data)
                            <tr>
                                <td style="color:white;">{{ $data->result_id }}</td>
                                @switch($data->kode)
                                    @case('sh1')
                                    <td style="color:gold;background:darkred;">Hadiah ke-1</td>
                                    @break
                                    @case('sh2')
                                    <td style="color:gold;background:darkred;">Hadiah ke-2</td>
                                    @break
                                    @case('sh3')
                                    <td style="color:gold;background:darkred;">Hadiah ke-3</td>
                                    @break
                                    @case('sh4')
                                    <td style="color:white;background:darkgoldenrod;">Starter 1</td>
                                    @break
                                    @case('sh5')
                                    <td style="color:white;background:darkgoldenrod;">Starter 2</td>
                                    @break
                                    @case('sh6')
                                    <td style="color:white;background:darkgoldenrod;">Starter 3</td>
                                    @break
                                    @case('sh7')
                                    <td style="color:white;">Consol 1</td>
                                    @break
                                    @case('sh8')
                                    <td style="color:white;">Consol 2</td>
                                    @break
                                    @case('sh9')
                                    <td style="color:white;">Consol 3</td>
                                    @break
                                    @case('sh10')
                                    <td style="color:white;">Consol 4</td>
                                    @break
                                    @case('sh11')
                                    <td style="color:white;">Consol 5</td>
                                    @break
                                    @case('sh12')
                                    <td style="color:white;">Consol 6</td>
                                    @break
                                    @case('sh13')
                                    <td style="color:white;">Consol 7</td>
                                    @break
                                    @case('sh14')
                                    <td style="color:white;">Consol 8</td>
                                    @break
                                    @case('sh15')
                                    <td style="color:white;">Consol 9</td>
                                    @break

                                @endswitch
                                <td style="color:white;">{{ $data->hasil }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <div>

        </div>
    </div>
</div>



<div class="container-fluid">
    <h1 class="text-center font-weight-bold" style="letter-spacing: 0.2rem; margin:0;">GRAND SHANGHAI</h1>
</div>
<a href="https://wa.me/+6287886486915" class="whatsapp_float" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
<footer class="w-100 " style="background: #091353; ">

    <h6 class="text-center text-white" style="padding-top:1rem;">GRAND SHANGHAI &copy;2019 Copyright</h6>
    <div class="text-center pb-3" >
        <span><a href="#"><i class="fab fa-instagram fa-2x" style="color:white; margin-right: 10px;" ></i></a></span>
        <span><a href="#"><i class="fab fa-facebook fa-2x" style="color:white; margin-right: 10px;"></i></a></span>
        <span><a href="#"><i class="fab fa-youtube fa-2x" style="color:white; margin-right:10px;"></i></a></span>
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
