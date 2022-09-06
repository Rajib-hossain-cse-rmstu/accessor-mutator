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

                    How are you, {{auth()->user()->first_name}} {{auth()->user()->last_name}}

                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.L</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $users = App\Models\User::all();
                            @endphp
                            @if($users->count()>0)
                            @foreach($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>
                                <th scope="col">S.L</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
