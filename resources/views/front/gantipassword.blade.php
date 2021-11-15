@extends('layouts.app')
@section('gantipassword')
    <div class="container">
         <div class="row mt-1">
             <div class="col-lg-6">
                 @include('flash-message')
                 <div class="card">
                     <div class="card-header bg-primary text-white">
                         Informasi Member dan Ganti Password.
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-lg-6">
                                 <label for="nama" class="col-form-label">Nama </label>
                             </div>
                             <div class="col-lg-6">
                                 <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                             </div>
                         </div>
                         <div class="row mt-1">
                             <div class="col-lg-6">
                                 <label for="username" class="col-form-label">username </label>
                             </div>
                             <div class="col-lg-6">
                                 <input type="text" class="form-control" value="{{ Auth::user()->username }}" readonly>
                             </div>
                         </div>

                         <form action="{{ route('gantipasswordbaru') }}" method="POST">
                             @csrf
                             @method('PUT')

                             <div class="row mt-1">
                                 <div class="col-lg-6">
                                     <label for="passwordlama" class="col-form-label">Password Lama </label>
                                 </div>
                                 <div class="col-lg-6">
                                     <input type="password" id="password" name="passwordlama" class="form-control" placeholder="Password Lama" minlength="8" maxlength="12">
                                 </div>
                             </div>
                             <div class="row mt-1">
                                 <div class="col-lg-6">
                                     <label for="passwordbaru" class="col-form-label">Password baru </label>
                                 </div>
                                 <div class="col-lg-6">
                                     <input type="password"  name="passwordbaru" class="form-control" value="" placeholder="Password Baru" minlength="8" maxlength="12">
                                 </div>
                             </div>
                             <div class="row mt-1">
                                 <div class="col-lg-6">
                                     <label for="Konfirmasi password" class="col-form-label">Konfirmasi Password </label>
                                 </div>
                                 <div class="col-lg-6">
                                     <input type="password"  name="passwordkonfirmasi" class="form-control" value="" placeholder="Konfirmasi Password" minlength="8" maxlength="12">
                                 </div>
                             </div>
                             <div class="row mt-1">
                                 <div class="col-lg-6">

                                 </div>
                                 <div class="col-lg-6">
                                     <button type="submit" class="btn btn-danger form-control">Change password</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>



        <div class="row mt-1">


        </div>
        <div class="row mt-1">

        </div>
    </div>

@endsection
