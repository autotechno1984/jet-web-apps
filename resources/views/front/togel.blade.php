@extends('layouts.app')
@section('togel')
    <div class="container" style="margin-top: 20px; overflow-y: scroll; height: 85vh;">
        <div class="row" style="background: #96C7C1; width: 99%; margin-inline: auto; box-shadow: 3px 3px #fff; margin-bottom:5px; ">
            <div class="col-lg-12 text-center">
                @foreach($markets->where('id', $id) as $market)
                <h4 style="font-family: Roboto;">
                    Market : {{ $market->pasaran }}  </h4>
                    <h5>{{ $market->periode }} - {{ date('d-m-Y',strtotime($market->tgl_periode)) }}</h5>
                    <h6>Tutup Jam : {{ $market->jam_tutup }} - Hasil Dibuka Jam : {{ $market->jambuka }}</h6>

                @endforeach
            </div>
        </div>


        <div class="row">


            <div class="col-lg-7 mt-1">
                @include('flash-message')

                <div class="accordion accordion-flush" id="accordionFlushExample" disabled>

{{--                     4D BB                                                   --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                4D - 3D - 2D
                            </button>
                        </h2>

                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <div class="accordion accordion-flush" id="accordionFlushTogel">

{{--                                    4D-3D-2D--}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header text-center" id="flush-headingOnes" >
                                            <button class="accordion-button collapsed "  style="background: #88E0EF;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOnes" aria-expanded="false" aria-controls="flush-collapseOnes">
                                                4D-3D-2D
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOnes" class="accordion-collapse collapse" aria-labelledby="flush-headingOnes" data-bs-parent="#accordionFlushTogel">

                                            <div class="accordion-body">
                                                <form action="{{ route('angka') }}" method="POST">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-lg-3 mt-1">
                                                            <input type="id" name="id" value="{{$id}}"hidden>
                                                            <input type="text" name="nomor" id="nomor" class="form-control" placeholder="4D-3D-2D" maxlength="4">
                                                        </div>
                                                        <div class="col-lg-3 mt-1">
                                                            <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal" maxlength="8">
                                                        </div>
                                                        <div class="col-lg-3 mt-1">
                                                            <button class="btn btn-primary form-control">
                                                                Tambah
                                                            </button>
                                                        </div>

                                                     </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
{{--                                        Bolak-Balik--}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwos">
                                            <button class="accordion-button collapsed" style="background: #88E0EF;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwos" aria-expanded="false" aria-controls="flush-collapseTwos">
                                                4D BOLAK-BALIK
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwos" class="accordion-collapse collapse" aria-labelledby="flush-headingTwos" data-bs-parent="#accordionFlushTogel">
                                            <div class="accordion-body">
                                                <form action="{{ route('angkabb') }}" method="POST">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-3 mt-1">
                                                        <input type="id" name="id" value="{{$id}}"hidden>
                                                        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="4D-3D-2D" maxlength="4">
                                                    </div>
                                                    <div class="col-lg-3 mt-1">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal" maxlength="8">
                                                    </div>
                                                    <div class="col-lg-3 mt-1">
                                                        <button class="btn btn-primary form-control">
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
{{--                                        Bolak-Balik 5Digit--}}
{{--                                    <div class="accordion-item">--}}
{{--                                        <h2 class="accordion-header" id="flush-headingThrees">--}}
{{--                                            <button class="accordion-button collapsed" style="background: #88E0EF; "type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThrees" aria-expanded="false" aria-controls="flush-collapseThrees">--}}
{{--                                              BOLAK-BALIK 5 DIGIT--}}
{{--                                            </button>--}}
{{--                                        </h2>--}}
{{--                                        <div id="flush-collapseThrees" class="accordion-collapse collapse" aria-labelledby="flush-headingThrees" data-bs-parent="#accordionFlushTogel">--}}
{{--                                            <div class="accordion-body">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-3 mt-1">--}}
{{--                                                        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="5-Digit Nomor" maxlength="5">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-3 mt-1">--}}
{{--                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal" maxlength="8">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-3 mt-1">--}}
{{--                                                        <button class="btn btn-primary form-control">--}}
{{--                                                            Tambah--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}


                                </div>
                            </div>
                    </div>
                    </div>

{{--                     colok  Colok-Bebas, Colok-Jitu, Colok-Naga, Colok-Macau --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                COLOK - BEBAS - MACAU - JITU - NAGA
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <div class="accordion accordion-flush" id="accordionFlushColok">

{{--                                        COLOK - BEBAS --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingcolokbebas">
                                            <button class="accordion-button collapsed" style="background: #F6EABE;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsecolokbebas" aria-expanded="false" aria-controls="flush-collapsecolokbebas">
                                                COLOK - BEBAS
                                            </button>
                                        </h2>
                                        <div id="flush-collapsecolokbebas" class="accordion-collapse collapse" aria-labelledby="flush-headingcolokbebas" data-bs-parent="#accordionFlushColok">
                                            <div class="accordion-body">
                                                <form action="{{ route('colokbebas') }}" method="POST">
                                                    @csrf
                                                     <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="nomor colok" maxlength="1">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal .." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">Tambah</button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

{{--                                        COLOK - MACAU --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingcolokmacau">
                                            <button class="accordion-button collapsed" style="background: #F6EABE;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsecolokmacau" aria-expanded="false" aria-controls="flush-collapsecolokmacau">
                                                COLOK - MACAU
                                            </button>
                                        </h2>
                                        <div id="flush-collapsecolokmacau" class="accordion-collapse collapse" aria-labelledby="flush-headingcolokmacau" data-bs-parent="#accordionFlushColok">
                                            <div class="accordion-body">
                                                <form action="{{ route('colokmacau') }}" method="POST">
                                                 @csrf

                                                    <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="pilih 2 nomor" maxlength="2">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal .." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">Tambah</button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

{{--                                        COLOK - JITU  --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingcolokjitu">
                                            <button class="accordion-button collapsed" style="background: #F6EABE;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsecolokjitu" aria-expanded="false" aria-controls="flush-collapsecolokjitu">
                                                COLOK - JITU
                                            </button>
                                        </h2>
                                        <div id="flush-collapsecolokjitu" class="accordion-collapse collapse" aria-labelledby="flush-headingcolokjitu" data-bs-parent="#accordionFlushColok">
                                            <div class="accordion-body">
                                                <form action="{{ route('colokjitu') }}" method="POST">
                                                    @csrf
                                                <div class="row">
                                                    <div class="col-lg-4 mt-1">


                                                            <div class="row">

                                                            <div class="col-lg-6">
                                                                <select name="posisi" id="posisi" class="form-select">
                                                                    <option selected>Pilih</option>
                                                                    <option value="1">AS</option>
                                                                    <option value="2">KOP</option>
                                                                    <option value="3">KEPALA</option>
                                                                    <option value="4">EKOR</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                                <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor..." maxlength="1">
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal .." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">Tambah</button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

{{--                                        COLOK - NAGA  --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingcoloknaga">
                                            <button class="accordion-button collapsed" style="background: #F6EABE;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsecoloknaga" aria-expanded="false" aria-controls="flush-collapsecoloknaga">
                                                COLOK - NAGA
                                            </button>
                                        </h2>
                                        <div id="flush-collapsecoloknaga" class="accordion-collapse collapse" aria-labelledby="flush-headingcoloknaga" data-bs-parent="#accordionFlushColok">
                                            <div class="accordion-body">
                                                <form action="{{ route('coloknaga') }}" method="POST">
                                                    @csrf

                                                     <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="nomor colok naga 3 digit" maxlength="3">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal .." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">Tambah</button>
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

 {{--                    50-50 Umum, Spesial, Kombinasi                          --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                               50 - 50 - UMUM - SPESIAL - KOMBINASI
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <div class="accordion accordion-flush" id="accordionlimapuluh">

{{--                                    50-50 UMUM      --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headinglimapuluhumum">
                                            <button class="accordion-button collapsed" style="background: #D8E9A8;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapselimapuluhumum" aria-expanded="false" aria-controls="flush-collapselimapuluhumum">
                                                BESAR - KECIL - GENAP - GANJIL - TENGAH -TEPI
                                            </button>
                                        </h2>
                                        <div id="flush-collapselimapuluhumum" class="accordion-collapse collapse" aria-labelledby="flush-headinglimapuluhumum" data-bs-parent="#accordionlimapuluh">

                                            <div class="accordion-body">
                                                <form action="{{ route('limapuluh') }}" method="POST">
                                                @csrf
                                                    <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <select name="nomor" id="nomor" class="form-select">

                                                            <option value="BESAR">BESAR</option>
                                                            <option value="KECIL">KECIL</option>
                                                            <option value="GENAP">GENAP</option>
                                                            <option value="GANJIL">GANJIL</option>
                                                            <option value="TENGAH">TENGAH</option>
                                                            <option value="TEPI">TEPI</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="nominal..." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                         <button class="btn btn-primary form-control">
                                                             Tambah
                                                         </button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>

{{--                                    50-50 SPESIAL   --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headinglimapuluhspesial">
                                            <button class="accordion-button collapsed" type="button" style="background: #D8E9A8;" data-bs-toggle="collapse" data-bs-target="#flush-collapselimapuluhspesial" aria-expanded="false" aria-controls="flush-collapselimapuluhspesial">
                                                50 - 50 SPESIAL
                                            </button>
                                        </h2>
                                        <div id="flush-collapselimapuluhspesial" class="accordion-collapse collapse" aria-labelledby="flush-headinglimapuluhspesial" data-bs-parent="#accordionlimapuluh">

                                            <div class="accordion-body">
                                                <form action="{{route('limapuluhsp')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <select name="posisi" id="posisi" class="form-select">
                                                                    <option value="1">AS</option>
                                                                    <option value="2">KOP</option>
                                                                    <option value="3">KEPALA</option>
                                                                    <option value="4">EKOR</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <select name="nomor" id="nomor" class="form-select">
                                                                    <option value="BESAR">BESAR</option>
                                                                    <option value="KECIL">KECIL</option>
                                                                    <option value="GENAP">GENAP</option>
                                                                    <option value="GANJIL">GANJIL</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal ..." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <button class="btn btn-primary form-control">
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

{{--                                        50-50 KOMBINASI -- --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headinglimapuluhkombinasi">
                                            <button class="accordion-button collapsed" type="button" style="background: #D8E9A8;" data-bs-toggle="collapse" data-bs-target="#flush-collapselimapuluhkombinasi" aria-expanded="false" aria-controls="flush-collapselimapuluhkombinasi">
                                               50 - 50 KOMBINASI
                                            </button>
                                        </h2>
                                        <div id="flush-collapselimapuluhkombinasi" class="accordion-collapse collapse" aria-labelledby="flush-headinglimapuluhkombinasi" data-bs-parent="#accordionlimapuluh">
                                            <div class="accordion-body">
                                                <form action="{{ route('limapuluhkb') }}" method="POST">
                                                    @csrf

                                                    <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <select name="posisi" id="posisi" class="form-select">
                                                                    <option value="DEPAN">DEPAN</option>
                                                                    <option value="TENGAH">TENGAH</option>
                                                                    <option value="BELAKANG">BELAKANG</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <select name="nomor" id="nomor" class="form-select">
                                                                    <option value="MONO">MONO</option>
                                                                    <option value="STEREO">STEREO</option>
                                                                    <option value="KEMBANG">KEMBANG</option>
                                                                    <option value="KEMPIS">KEMPIS</option>
                                                                    <option value="KEMBAR">KEMBAR</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal ..." maxlength="8">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <button class="btn btn-primary form-control">
                                                            Tambah
                                                        </button>
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

{{--                     DLL Macau/Kombinasi, Dasar, Shio                        --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                MACAU/KOMBINASI - DASAR - SHIO
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <div class="accordion accordion-flush" id="accordiondanlain">

{{--                                    MACAU / KOMBINASI             --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingmacau">
                                            <button class="accordion-button collapsed" style="background: #FFCCD2;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsemacau" aria-expanded="false" aria-controls="flush-collapsemacau">
                                                MACAU / KOMBINASI
                                            </button>
                                        </h2>
                                        <div id="flush-collapsemacau" class="accordion-collapse collapse" aria-labelledby="flush-headingmacau" data-bs-parent="#accordiondanlain">
                                            <div class="accordion-body">
                                                <form action="{{ route('macau') }}" method="POST">
                                                    @csrf

                                                     <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-4 mt-1">
                                                                <select name="posisi" id="posisi" class="form-select" style="font-size:0.8rem;">
                                                                    <option value="DEPAN">DEPAN</option>
                                                                    <option value="TENGAH">TENGAH</option>
                                                                    <option value="BELAKANG">BELAKANG</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mt-1">
                                                                <select name="nomor" id="nomor" class="form-select " style="font-size:0.8rem;">
                                                                    <option value="BESAR">BESAR</option>
                                                                    <option value="KECIL">KECIL</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mt-1">
                                                                <select name="nomor2" id="nomor2" class="form-select " style="font-size:0.8rem;">
                                                                    <option value="GENAP">GENAP</option>
                                                                    <option value="GANJIL">GANJIL</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-6 mt-1 cols-macau ">
                                                                <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                                <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal ...." maxlength="8" style="font-size:0.8rem;">
                                                            </div>
                                                            <div class="col-lg-6 mt-1 cols-macau">
                                                                <button class="btn btn-primary form-control" style="font-size:0.8rem;">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

{{--                                    DASAR                        --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingdasar">
                                            <button class="accordion-button collapsed" style="background: #FFCCD2;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsedasar" aria-expanded="false" aria-controls="flush-collapsedasar">
                                                DASAR
                                            </button>
                                        </h2>
                                        <div id="flush-collapsedasar" class="accordion-collapse collapse" aria-labelledby="flush-headingdasar" data-bs-parent="#accordiondanlain">

                                            <div class="accordion-body">
                                                <form action="{{ route('dasar') }}" method="POST">
                                                    @csrf

                                                    <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <select name="nomor" id="nomor" class="form-select">
                                                            <option value="BESAR">BESAR</option>
                                                            <option value="KECIL">KECIL</option>
                                                            <option value="GENAP">GENAP</option>
                                                            <option value="GENAP">GANJIL</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal " maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>

{{--                                    SHIO                         --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingshio">
                                            <button class="accordion-button collapsed" style="background: #FFCCD2;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseshio" aria-expanded="false" aria-controls="flush-collapseshio">
                                                SHIO
                                            </button>
                                        </h2>
                                        <div id="flush-collapseshio" class="accordion-collapse collapse" aria-labelledby="flush-headingshio" data-bs-parent="#accordiondanlain">
                                            <div class="accordion-body">
                                                <form action="{{ route('shio') }}" method="POST">
                                                    @csrf

                                                    <div class="row">
                                                    <div class="col-lg-4 mt-1">
                                                        <select name="nomor" id="" class="form-select">
                                                            <option selected>Pilih Shio</option>
                                                            <option value="TIKUS">TIKUS</option>
                                                            <option value="BABI">BABI</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                                        <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal .." maxlength="8">
                                                    </div>
                                                    <div class="col-lg-4 mt-1">
                                                        <button class="btn btn-primary form-control">
                                                            Tambah
                                                        </button>
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
            </div>



            <div class="col-lg-5 mt-1">
                    <div class="card">
                        <div class="card-header text-center" style="background: gray; color:white;">
                            Invoice Taruhan
                        </div>
                        <div class="card-body" style="padding:0;">
                                <table class="table table-bordered text-center" style="font-size:0.8rem;">
                                    <thead >
                                        <tr>
                                            <th>KD</th>
                                            <th>PT</th>
                                            <th>Order</th>
                                            <th>Amount</th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @forelse($tempInv as $data)
                                            <tr>
                                                @switch($data->kode)
                                                    @case('4D')
                                                    <td style="font-weight: bold; background: #88E0EF; ">{{$data->kode}}</td>
                                                    @break

                                                    @case('3D')
                                                    <td style="font-weight: bold; background: #88E0EF; ">{{$data->kode}}</td>
                                                    @break

                                                    @case('2D')
                                                    <td style="font-weight: bold; background: #88E0EF; ">{{$data->kode}}</td>
                                                    @break

                                                    @case('CLB')
                                                    <td style="font-weight: bold;background: #F6EABE;">{{$data->kode}}</td>
                                                    @break

                                                    @case('CLM')
                                                    <td style="font-weight: bold; background: #F6EABE;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('CLJ')
                                                    <td style="font-weight: bold; background: #F6EABE;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('CLN')
                                                    <td style="font-weight: bold; background: #F6EABE;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('5050')
                                                    <td style="font-weight: bold; background: #D8E9A8;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('50SP')
                                                    <td style="font-weight: bold; background: #D8E9A8;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('50KB')
                                                    <td style="font-weight: bold; background: #D8E9A8;"> {{$data->kode}}</td>
                                                    @break

                                                    @case('MCU')
                                                    <td style="font-weight: bold; background: #FFCCD2;">{{ $data->kode }}</td>
                                                    @break

                                                    @case('DSR')
                                                    <td style="font-weight: bold; background: #FFCCD2;">{{ $data->kode }}</td>
                                                    @break

                                                    @case('SHIO')
                                                    <td style="font-weight: bold; background: #FFCCD2;">{{ $data->kode }}</td>
                                                    @break

                                                    @default
                                                    <td style="font-weight: bold;">{{$data->kode}}</td>

                                                @endswitch



                                                <td>{{$data->posisi}}</td>
                                                    <td style="font-weight: bold; font-family:Audiowide; font-size:0.9rem;">
                                                        {{ $data->data }}
                                                    </td>

                                                <td>{{number_format($data->amount) }}</td>
                                                    <td>
                                                        <form action="{{ route('deleteorder', $data->id ) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" style=" box-shadow: none; border:1px solid white;"}}><i class="fa-solid fa-trash-can" style="color:red;"></i></button>
                                                        </form>
                                                    </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="5">Tidak Ada Pembelian</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            {{ $tempInv->links() }}
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="jumlah" id="total" style="font-size:0.8rem;" class="form-control font-weight-bold" readonly value="Total">
                            </div>
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="totalamount" id="diskon" class="form-control" style="font-size:0.8rem;" value="{{ number_format($totaldiskon->jumlah) }}" readonly>
                            </div>
                        </div>

                        <div class="row" style=" margin-top:1px;">
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="total" id="total" style="font-size:0.8rem;" class="form-control font-weight-bold" readonly value="Total Diskon">
                            </div>
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="diskon" id="diskon" class="form-control" style="font-size:0.8rem;" value="{{ number_format($totaldiskon->total) }}" readonly>
                            </div>
                        </div>

                        <div class="row " style=" margin-top:1px;">
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="grandtotal" id="total" style="font-size:0.8rem;" class="form-control font-weight-bold" style="font-size:0.8rem;" readonly value="Grand Total">
                            </div>
                            <div class="col-lg-6 col-amount">
                                <input type="text" name="grandtotal" id="diskon"  style="font-size:0.8rem;" class="form-control" value="{{ number_format($totaldiskon->jumlah - $totaldiskon->total) }}" readonly>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-lg-6 col-amount">
                                <form action="{{ route('deleteorderall') }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                <button type="submit" class="btn btn-danger form-control">Batal</button>
                                </form>
                            </div>
                            <div class="col-lg-6 col-amount">
                                <form action="{{ route('createinvoice') }}" method="POST">
                                    @csrf
                                    <input type="id" name="id" value="{{$id}}"hidden>
                                    <button class="btn btn-primary form-control">Simpan</button>
                                </form>

                            </div>
                        </div>

                    </div>
            </div>

        </div>
    </div>
@endsection
