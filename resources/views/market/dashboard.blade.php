@extends('layouts.app')
@section('marketdashboard')
<div class="container text-center pt-2">
    <div class="row">
        <div class="col bg-primary text-white shadow" style="border-radius:5px; width: 450px;" >
                <p style="margin:0;">Pasaran : <span>{{ $pasaran->pasaran }} </span></p>
                <p style="margin:0;">Periode: <span>{{ $pasaran->id }} </span> <span> - </span>{{ date("d-m-Y",strtotime($pasaran->tgl_periode)) }}</p>
                <p style="margin:0; padding-bottom:10px;">Jam Tutup : {{ $pasaran->jam_tutup }}</p>
        </div>
    </div>
    <div class="row mt-1" id="menu-dashboard">
        <div class="col-sm-2">
            <div class="flex-menu"  style="padding:0;" id="sidebar-game">
                <div class="mt-1">
                    <a href="{{ route('empatd', [$id]) }}" class="btn btn-success form-control shadow">4D - 3D - 2D</a>
                </div>
{{--                <div class="mt-1 dropdown bg-success">--}}
{{--                    <a class="btn btn-success dropdown-toggle form-control"  href="#" role="button" id="dropdownColok" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        C O L O K--}}
{{--                    </a>--}}

{{--                    <ul class="dropdown-menu bg-success w-100" aria-labelledby="dropdownColok">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('colokbebasview', [$id]) }}">Bebas</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('colokmacauview', [$id]) }}">Macau</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.colokjitu', [$id]) }}">Jitu</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.coloknaga', [$id]) }}">Naga</a></li>--}}
{{--                    </ul>--}}

{{--                </div>--}}
{{--                <div class="mt-1 dropdown">--}}
{{--                    <a class="btn btn-warning dropdown-toggle form-control" href="#" role="button" id="dropdown5050" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        5 0 - 5 0--}}
{{--                    </a>--}}

{{--                    <ul class="dropdown-menu w-100" aria-labelledby="dropdown5050">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.limapuluhumum', [$id]) }}">Umum</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.limapuluhkombinasi' , [$id]) }}">Kombinasi</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.limapuluhspesial', [$id]) }}">Spesial</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="mt-1 dropdown">--}}
{{--                    <a class="btn btn-warning form-control dropdown-toggle" href="#" role="button" id="dropdowndanlainlain" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        D L L--}}
{{--                    </a>--}}

{{--                    <ul class="dropdown-menu w-100" aria-labelledby="dropdowndanlainlain">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.macau', [$id]) }}">MACAU</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.dasar', [$id]) }}">DASAR</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{ route('view.shio', [$id]) }}">SHIO</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
        </div>
        <div class="col-sm-10 mt-1">
            @yield('empatd')
            @yield('colokbebas')
            @yield('colokmacau')
            @yield('colokjitu')
            @yield('coloknaga')
            @yield('limapuluhumum')
            @yield('limapuluhkombinasi')
            @yield('limapuluhspesial')
            @yield('macauview')
            @yield('dasarview')
            @yield('shioview')
        </div>
    </div>


</div>
@endsection

