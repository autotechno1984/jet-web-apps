@extends('market.dashboard')
@section('dasarview')
    <div>
        @livewire('dasar', ['id' => $id])
    </div>
@endsection
