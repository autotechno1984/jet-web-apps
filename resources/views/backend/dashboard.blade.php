@extends('layouts.admin-panel')
@section('dashboard')
    <div style="margin-top:10px; margin-right: 20px; margin-left: 20px;">
            <div class="row">
                <div class="col-lg-3">
                    <h6>Pasaran yang sedang berjalan</h6>
                </div>
            </div>
            <div class="row">
                @forelse($result as $data)
                        <div class="col-lg-3">
                            <button class="form-control btn-outline-primary" aria-disabled>
                                {{ $data->id }} - {{ $data->pasaran }} - {{ number_format($invoicedetail->where('result_id', $data->id)->sum('amount')) }}
                            </button>
                        </div>
                @empty
                    <h5>Blm ada pasaran</h5>
                @endforelse
            </div>
            <div class="row mt-1">
                <livewire:omset />
            </div>
    </div>
@endsection
