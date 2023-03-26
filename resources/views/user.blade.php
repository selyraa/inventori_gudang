@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <table class="table table-responsive">
                        <tr><th>ID User</th><th>:</th><td>{{ $user->idUser }}</td></tr>
                        <tr><th>Nama</th><th>:</th><td>{{ $user->nama }}</td></tr>
                        <tr><th>Username</th><th>:</th><td>{{ $user->username }}</td></tr>
                        <tr><th>Created</th><th>:</th><td>{{ $user->created_at }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection