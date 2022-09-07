@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 col-lg-6 p-5">
        <a class="float-start btn btn-lg btn-primary px-5" href="{{route('task.create')}}">Create Task</a>
    </div>
    <div class="col-md-6 col-lg-6 p-5">
        <a class="float-end btn btn-primary btn-lg p-2 m-r-5" href="{{route('task.list')}}">List of Task</a>
    </div>
</div>
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

        <div class="col-md-4">
            <a href="{{route('image.download')}}" download="auth()->user()->picture">
                <img src="{{url('/uploads/'. auth()->user()->picture)}}" alt="image">
            </a>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <a href="{{route('image.download')}}"  title="image">
                        <img style="width: 200px; height:200px;" src="https://cdn.pixabay.com/photo/2022/08/28/08/49/beach-7416035_960_720.jpg" alt="image" >
                    </a>                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
