@extends('market.dashboard')
@section('macauview')
    <div>
        @livewire('macau', ['id'=> $id])
    </div>
@endsection
