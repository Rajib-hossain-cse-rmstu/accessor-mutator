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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Task') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <h3 class="text-dark">Created Task List</h3>
                    </div>

                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">S.L</th>
                                <th scope="col">Title</th>
                                <th scope="col">Invited User</th>
                                <th scope="col">Starting Time</th>
                                <th scope="col">Ending Time</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $users = App\Models\User::all();
                            @endphp
                            @if($tasks->count()>0)
                  
                            @foreach($tasks as $key=>$task)
                        
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$task->title}}</td>
                                <td>
                                    @php 
                                        $users = json_decode($task->user_id, true); 
                                        @endphp
                                        @foreach($users as $key=>$user)
                                        <span style="border-radius: 5px;background:green;color:white;padding:3px; ">{{$user}}</span>
                                    @endforeach
                                </td>
                           
                                <td>{{$task->starting_time->format('h:i:s a')}}</td>
                                <td>{{$task->ending_time->format('h:i:s a')}}</td>
                                <td>{{$task->starting_date->format('Y-m-d')}}</td>
                                <td>{{$task->ending_date->format('Y-m-d')}}</td>
                                <td>{{$task->details}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                        <tfoot>
                            <tr>
                                <th scope="col">S.L</th>
                                <th scope="col">Title</th>
                                <th scope="col">Invited User</th>
                                <th scope="col">Starting Time</th>
                                <th scope="col">Ending Time</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col">Details</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
