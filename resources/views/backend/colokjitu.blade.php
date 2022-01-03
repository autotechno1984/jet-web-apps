@extends('market.dashboard')
@section('colokjitu')
    <div>
        @livewire('colokjitu', ['id' => $id])
    </div>
@endsection
