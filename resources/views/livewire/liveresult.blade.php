<div wire:poll.keep-alive class="container" style="padding-top:10px; padding-bottom:10px; ">
    <div class="text-center" id="web">
        <div style="background: red; padding:5px; border-radius: 5px;">
            <h1>GRAND SHANGHAI</h1>
        </div>

        <h1 class="mt-2" style="font-family: 'salsa', cursive;">{{ $liveresult->pluck('pasaran')->first() }}</h1>
        <h3 style="letter-spacing: 5px; font-family: 'salsa', cursive;">Periode : <span class="text-decoration-underline">{{ $liveresult->pluck('periode')->first() }}</span></h3>
        <h3 style="font-family: 'salsa', cursive;">{{ \Carbon\Carbon::parse($liveresult->pluck('tanggal')->first())->locale('id')->dayName .' , '. date('d-m-Y', strtotime($liveresult->pluck('tanggal')->first()))  }} </h3>
    <div class="text-center mx-auto" style="background: red; border-radius: 5px; padding:5px; width: 80%">
        <h2 style="letter-spacing: 10px;">GRAND PRIZES</h2>
    </div>
        <div class="mx-auto mt-1" style="width: 80%; padding:5px; border-radius:5px; border:1px solid white;">
            <div class="row mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Hadiah Pertama</h2>
                </div>
                <div class="col-7" style="background: black">
                    <h2 style="letter-spacing: 5px; font-weight: bold">{{ $liveresult->pluck('sh1')->first() }}</h2>
                </div>
            </div>
            <div class="row mt-1 mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Hadiah Kedua</h2>
                </div>
                <div class="col-7" style="background: white;">
                    <h2 style="letter-spacing: 5px; color:black;">{{ $liveresult->pluck('sh2')->first() }}</h2>
                </div>
            </div>
            <div class="row mt-1 mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Hadiah Ketiga</h2>
                </div>
                <div class="col-7" style="background: white;">
                    <h2 style="letter-spacing: 5px; color:black;">{{ $liveresult->pluck('sh3')->first() }}</h2>
                </div>
            </div>
        </div>
        <div class="text-center mx-auto mt-1" style="background: red; border-radius: 5px; padding:5px; width: 80%">
            <h2 style="letter-spacing: 10px;">STARTER PRIZE</h2>
        </div>
        <div class="mx-auto mt-1" style="width: 80%; padding:5px; border-radius:5px; border:1px solid white;">
            <div class="row mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Pertama</h2>
                </div>
                <div class="col-7" style="background: white">
                    <h2 style="color:gold; letter-spacing: 5px; font-weight: bold">{{ $liveresult->pluck('sh4')->first() }}</h2>
                </div>
            </div>
            <div class="row mt-1 mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Kedua</h2>
                </div>
                <div class="col-7" style="background: white;">
                    <h2 style="letter-spacing: 5px; color:black;">{{ $liveresult->pluck('sh5')->first() }}</h2>
                </div>
            </div>
            <div class="row mt-1 mx-auto">
                <div class="col-5" style="background: red;">
                    <h2>Ketiga</h2>
                </div>
                <div class="col-7" style="background: white;">
                    <h2 style="letter-spacing: 5px; color:black;">{{ $liveresult->pluck('sh6')->first() }}</h2>
                </div>
            </div>
        </div>
        <div class="text-center mx-auto mt-1" style="background: red; border-radius: 5px; padding:5px; width: 80%">
            <h2 style="letter-spacing: 10px;">CONSOLATION PRIZE</h2>
        </div>

        <div class="text-center mx-auto mt-1" style="background: red; border-radius: 5px; padding:5px; width: 80%">
            <h2 style="letter-spacing: 5px; color:gold;">HIBURAN PERTAMA</h2>
        </div>
        <div class="d-flex text-center mx-auto" style="background: white; width: 80%; height: 50px; border-radius: 0px 0px 5px 5px;">
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px; ">{{ $liveresult->pluck('sh7')->first() }}</h1>
            </div>
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh8')->first() }}</h1>
            </div>
            <div style="color:black; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh9')->first() }}</h1>
            </div>
        </div>

        <div class="text-center mx-auto mt-1" style="background: red; border-radius: 5px; padding:5px; width: 80%">
            <h2 style="letter-spacing: 5px; color:gold;">HIBURAN KEDUA</h2>
        </div>
        <div class="d-flex text-center mx-auto" style="background: white; width: 80%; height: 50px; border-radius: 0px 0px 5px 5px;">
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px; ">{{ $liveresult->pluck('sh10')->first() }}</h1>
            </div>
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh11')->first() }}</h1>
            </div>
            <div style="color:black; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh12')->first() }}</h1>
            </div>
        </div>

        <div class="text-center mx-auto mt-1" style="background: red; border-radius: 5px; padding:5px; width: 80%">
            <h2 style="letter-spacing: 5px; color:gold;">HIBURAN KETIGA</h2>
        </div>
        <div class="d-flex text-center mx-auto" style="background: white; width: 80%; height: 50px; border-radius: 0px 0px 5px 5px;">
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px; ">{{ $liveresult->pluck('sh13')->first() }}</h1>
            </div>
            <div style="color:black; border-right: 1px solid grey; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh14')->first() }}</h1>
            </div>
            <div style="color:black; width: 33%;">
                <h1 style="color:black; letter-spacing: 3px;">{{ $liveresult->pluck('sh15')->first() }}</h1>
            </div>
        </div>


        <h1 style="font-family: 'salsa', cursive; margin-top:10px;">SALAM JP...</h1>
    </div>

    <div style="width:300px; height: 900px; border:2px solid gold;margin:auto;" id="liveresult">
        <div style="background:red;">
            <h3 style="border-bottom: 3px solid gold; padding:5px;" class="text-center">GRAND SHANGHAI</h3>

        </div>

        <h4 class="text-center" style="font-family: 'salsa', cursive;">{{ $liveresult->pluck('pasaran')->first() }}</h4>
        <h4 class="text-center" style="font-family: 'Salsa', cursive;">Periode : {{ $liveresult->pluck('periode')->first() }}</h4>
        <h4 class="text-center" style="font-family: 'Salsa', cursive;">{{ date('d-m-Y', strtotime($liveresult->pluck('tanggal')->first()))  }}</h4>
        <div style="background:red;">
            <h3 style="border-bottom: 3px solid gold; padding:5px; letter-spacing: 5px;" class="text-center">GRAND PRIZE</h3>
        </div>
        <div class="d-flex justify-content-around mt-3">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:20px; padding-left:20px;" >Hadiah 1</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input type="text" class="form-control" style="font-size:20px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px; background: black; color:gold;" value="{{ $liveresult->pluck('sh1')->first() }}" name="hadiahutamasatu" id="" placeholder=""  maxlength="4" readonly>
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-around">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:20px; padding-left:20px;"  >Hadiah 2</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input  type="text" class="form-control" style="font-size:20px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px;" value="{{ $liveresult->pluck('sh2')->first() }}" name="hadiahutamasatu" id="" placeholder="" maxlength="4" readonly>
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-around">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:20px; padding-left:20px;" >Hadiah 3</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input  type="text" class="form-control" style="font-size:20px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px;" name="hadiahutamasatu" value="{{$liveresult->pluck('sh3')->first()}}" id="" placeholder="" maxlength="4" readonly>
            </div>
        </div>

        <div style="background:red; margin-top:15px;">
            <h3 style="border-bottom: 3px solid gold; padding:5px; letter-spacing: 5px;" class="text-center">STARTER PRIZE</h3>
        </div>
        <div wire:poll class="d-flex justify-content-between mb-4">
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"1. ". $liveresult->pluck('sh4')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"2. ". $liveresult->pluck('sh5')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"3. ". $liveresult->pluck('sh6')->first() }}" readonly>
        </div>

        <div style="background:red; margin-top:15px; margin-bottom:0px;">
            <h3 style="border-bottom: 3px solid gold;margin-bottom:0px; padding:5px; letter-spacing: 5px;" class="text-center">CONSOLATION</h3>
        </div>
        <div style="background:red;">
            <h5 style=" padding:5px; letter-spacing: 5px; margin-bottom:0;" class="text-center">HIBURAN PERTAMA</h5>
        </div>
        <div wire:poll class="d-flex justify-content-between mt-1">
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"1. ". $liveresult->pluck('sh7')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"2. ". $liveresult->pluck('sh8')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"3. ". $liveresult->pluck('sh9')->first() }}" readonly>
        </div>
        <div style="background:red;">
            <h5 style=" padding:5px; letter-spacing: 5px; margin-bottom:0;" class="text-center">HIBURAN KEDUA</h5>
        </div>
        <div wire:poll class="d-flex justify-content-between mt-1">
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"4. ". $liveresult->pluck('sh10')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"5. ". $liveresult->pluck('sh11')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"6. ". $liveresult->pluck('sh12')->first() }}" readonly>
        </div>
        <div style="background:red;">
            <h5 style=" padding:5px; letter-spacing: 5px; margin-bottom:0;" class="text-center">HIBURAN KETIGA</h5>
        </div>
        <div wire:poll class="d-flex justify-content-between mt-1">
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"7. ". $liveresult->pluck('sh13')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"8. ". $liveresult->pluck('sh14')->first() }}" readonly>
            <input type="text" name="" id="" style="width:95px; font-size:20px;" value="{{"9. ". $liveresult->pluck('sh15')->first() }}" readonly>
        </div>

        <h4 class="text-center mt-5">Salam Jp !!</h4>

    </div>
</div>
