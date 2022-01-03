@extends('market.dashboard')
@section('empatd')
    <div>
        @livewire('empatd', ['id' => $id])
    </div>
@endsection

