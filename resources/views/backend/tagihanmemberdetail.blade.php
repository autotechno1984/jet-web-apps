@extends('layouts.admin-panel')
@section('tagihanmemberdetail')
    <div style="margin:10px 20px 0 20px">
        @livewire('tagihanmemberdetail', ['id' => $id])
    </div>
@endsection
