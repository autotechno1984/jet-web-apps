<div wire:poll.keep-alive class="container" style="padding-top:10px; padding-bottom:10px; ">
    <div style="width:340px; height: 900px; border:2px solid gold; padding-top:10px; padding-bottom:10px;margin:auto;" id="liveresult">
        <h1 style="font-family: 'Salsa', cursive; border-bottom: 3px solid gold; padding-bottom: 8px;" class="text-center">Shanghai Cobra</h1>
        @if($liveresult->pluck('status')->first() === 'LIVE')
            <h4 class="text-center" style="font-family: 'Salsa', cursive; font-weight: bold; color:gold;">Live ..</h4>
            @else
            <h4 class="text-center" style="font-family: 'Salsa', cursive;">Last Result</h4>
        @endif
        <h4 class="text-center" style="font-family: 'salsa', cursive;">{{ $liveresult->pluck('pasaran')->first() }}</h4>
        <h4 class="text-center" style="font-family: 'Salsa', cursive;">Periode : {{ $liveresult->pluck('periode')->first() }}</h4>
        <h4 class="text-center" style="font-family: 'Salsa', cursive;">{{ $liveresult->pluck('tanggal')->first()  }}</h4>
        <div class="d-flex justify-content-around mt-3">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:25px; padding-left:20px;" >1st Prize</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input type="text" class="form-control" style="font-size:25px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px;" value="{{ $liveresult->pluck('sh1')->first() }}" name="hadiahutamasatu" id="" placeholder=""  maxlength="4" readonly>
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-around">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:25px; padding-left:20px;"  >2nd Prize</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input  type="text" class="form-control" style="font-size:25px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px;" value="{{ $liveresult->pluck('sh2')->first() }}" name="hadiahutamasatu" id="" placeholder="" maxlength="4" readonly>
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-around">
            <div style="width:200px;">
                <label for="" class="col-form-label" style="font-family: 'Sura', serif; font-size:30px; padding-left:20px;" >3rd Prize</label>
            </div>
            <div wire:poll style="padding-right:25px;width:200px;">
                <input  type="text" class="form-control" style="font-size:25px; border-radius:25px; text-align: center; font-weight:bold; letter-spacing: 3px;" name="hadiahutamasatu" value="{{$liveresult->pluck('sh3')->first()}}" id="" placeholder="" maxlength="4" readonly>
            </div>
        </div>

        <h2 style="font-family: 'Sura'; margin-top:30px; text-align: center;">Starter Prize</h2>     <div wire:poll class="d-flex justify-content-between">
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"1. ". $liveresult->pluck('sh4')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"2. ". $liveresult->pluck('sh5')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"3. ". $liveresult->pluck('sh6')->first() }}" readonly>
        </div>

        <h2 style="font-family: 'Sura'; margin-top:30px; text-align: center;">Consolation Prize</h2>

        <div wire:poll class="d-flex justify-content-between">
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"1. ". $liveresult->pluck('sh7')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"2. ". $liveresult->pluck('sh8')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"3. ". $liveresult->pluck('sh9')->first() }}" readonly>
        </div>
        <div wire:poll class="d-flex justify-content-between mt-2">
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"4. ". $liveresult->pluck('sh10')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"5. ". $liveresult->pluck('sh11')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"6. ". $liveresult->pluck('sh12')->first() }}" readonly>
        </div>
        <div wire:poll class="d-flex justify-content-between mt-2">
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"7. ". $liveresult->pluck('sh13')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"8. ". $liveresult->pluck('sh14')->first() }}" readonly>
            <input type="text" name="" id="" style="width:100px; font-size:30px;" value="{{"9. ". $liveresult->pluck('sh15')->first() }}" readonly>
        </div>

        <h4 class="text-center mt-5">Salam Jp !!</h4>

    </div>
</div>
