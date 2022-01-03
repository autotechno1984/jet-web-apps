@extends('market.dashboard')
@section('shioview')
    <div>
        @livewire('shio', ['id' => $id])
    </div>
@endsection
