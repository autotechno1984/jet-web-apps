<div class="row mt-1 py-2" >
    @if (session()->has('krtdkcukup'))
        <div class="alert alert-danger">
            {{ session('krtdkcukup') }}
        </div>
    @endif

    @if (session()->has('kredit'))
        <div class="alert alert-success">
            {{ session('kredit') }}
        </div>
    @endif
    <div class="col-lg-3">
        <form wire:submit.prevent="search">
        <div class="row">
            @if (session()->has('message'))
                <span class="text-danger">
                        {{ session('message') }}
                </span>
            @endif
                <div class="col-lg-6">
                    <input wire:model="username" type="text" name="username" id="username" class="form-control" placeholder="username">

                </div>
                <div class="col-lg-6">
                    <button class="form-control btn-outline-primary">Check username</button>
                </div>

        </div>
        </form>
    </div>
    <div class="col-lg-5">

        <div class="row">

            <div class="col-lg-6">
                <label for="name" class="col-form-label">name <span style="font-weight: bold; color:blue;">{{ $searchname }}</span></label>
            </div>
            <div class="col-lg-6">
                <label for="kredit" class="col-form-label">Kredit : <span style="font-weight: bold;color:blue;">{{ number_format($searchkredit) }}</span> </label>
            </div>
        </div>


    </div>
    <div class="col-lg-4">
        <form wire:submit.prevent="addkredit">
        <div class="row">
            <input type="text" value="{{ $userid }}" hidden>
            <div class="col-lg-6">
                <input type="text" wire:model="kredit" id="kredit" placeholder="Tambah kredit + / Tarik Kredit -" class="form-control">
            </div>
            <div class="col-lg-6">
                <button class="btn-primary form-control"  {{ $disabled }}>Tambah</button>
            </div>

        </div>
        </form>
    </div>

</div>
