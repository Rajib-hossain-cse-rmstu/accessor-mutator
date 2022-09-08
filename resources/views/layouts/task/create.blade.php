@extends('layouts.app')
@section('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


  <script>
    $(document).ready(function(){
    $('#framework').multiselect({
    nonSelectedText: 'Invite User',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'100%'
    });
    });
</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Task') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('Invited User') }}</label>

                            <div class="col-md-6">

                                <select id="framework" class="form-select form-control select" name="user_id[]" id="user_id" aria-label="Floating label select example" multiple>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach
                                </select>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="details" class="col-md-4 col-form-label text-md-end">{{ __('Task Details') }}</label>

                            <div class="col-md-6">
                                <input id="details" type="text" class="form-control @error('details') is-invalid @enderror" name="details" value="{{ old('details') }}" required autocomplete="details">

                                @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Starting Date -->
                        <div class="row mb-3">
                            <label for="starting_date" class="col-md-4 col-form-label text-md-end">{{ __('Event Starting Date') }}</label>

                            <div class="col-md-6">
                                <input id="starting_date" type="date" class="form-control @error('starting_date') is-invalid @enderror" name="starting_date" value="{{ old('starting_date') }}" required autocomplete="starting_date" autofocus>
                                @error('starting_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Ending Date -->
                        <div class="row mb-3">
                            <label for="ending_date" class="col-md-4 col-form-label text-md-end">{{ __('Event Ending Date') }}</label>

                            <div class="col-md-6">
                                <input id="ending_date" type="date" class="form-control @error('ending_date') is-invalid @enderror" name="ending_date" value="{{ old('ending_date') }}" required autocomplete="ending_date" autofocus>
                                @error('ending_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Starting Time -->
                        <div class="row mb-3">
                            <label for="starting_time" class="col-md-4 col-form-label text-md-end">{{ __('Event Starting Time') }}</label>

                            <div class="col-md-6">
                                <input id="starting_time" type="time" class="form-control @error('starting_time') is-invalid @enderror" name="starting_time" value="{{ old('starting_time') }}" required autocomplete="starting_time" autofocus>
                                @error('starting_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <!-- Ending Time -->
                        <div class="row mb-3">
                            <label for="ending_time" class="col-md-4 col-form-label text-md-end">{{ __('Event Ending Time') }}</label>

                            <div class="col-md-6">
                                <input id="ending_time" type="time" class="form-control @error('ending_time') is-invalid @enderror" name="ending_time" value="{{ old('ending_time') }}" required autocomplete="ending_time" autofocus>
                                @error('ending_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row d-flex">
                            <div class="col-md-3 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>

                            <div class="col-md-3 offset-md-2">
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
