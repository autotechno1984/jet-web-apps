@extends('layouts.admin-panel')
@section('members')





    <div class="" style="margin-left:20px; margin-right:20px; margin-top:10px;">
        <div class="row">
            <div class="col-lg-2 mb-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary form-control">Add User</a>
            </div>
        </div>
        <livewire:members/>
{{--        <table id="members" class="table table-striped">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>ID</th>--}}
{{--                <th>Nama</th>--}}
{{--                <th>Username</th>--}}
{{--                <th>Kredit</th>--}}
{{--                <th>alamat</th>--}}
{{--                <th>Handphone</th>--}}
{{--                <th>Action</th>--}}
{{--                <th>Status</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            </tbody>--}}
{{--        </table>--}}

    </div>
@endsection


{{--@push('users')--}}
{{--    <script>--}}
{{--        $(function() {--}}
{{--            $('#members').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: '{!! route('admin.data') !!}',--}}
{{--                columns: [--}}
{{--                    { data: 'id'},--}}
{{--                    { data: 'name'},--}}
{{--                    { data: 'username'},--}}
{{--                    { data: 'profile.kredit'},--}}
{{--                    { data: 'profile.alamat'},--}}
{{--                    { data: 'profile.handphone'},--}}
{{--                    { data: 'action'},--}}
{{--                    { data: 'status',--}}
{{--                        render: function(data, type){--}}
{{--                            let status = 'ON';--}}
{{--                            let textcolor ;--}}
{{--                        if(type === 'display'){--}}
{{--                            if(data == 1) {--}}
{{--                                status = 'ON';--}}
{{--                                textcolor = 'green'--}}
{{--                            }else {--}}
{{--                                status = 'OFF';--}}
{{--                                textcolor = 'red'--}}
{{--                            }--}}

{{--                            return '<span style="color:'+ textcolor +'">' + status +'</span>'--}}
{{--                        }--}}
{{--                        return status;--}}
{{--                        }--}}
{{--                    },--}}


{{--                ]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
