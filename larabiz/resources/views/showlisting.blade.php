@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$listing->name}}                    
                        <a href="/" class="float-right btn btn-default bt-xs">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group">
                        <li class="list-group-item">Address : {{$listing->address}}</li>
                        <li class="list-group-item">Website : {{$listing->website}}</li>
                        <li class="list-group-item">E-mail : {{$listing->email}}</li>
                        <li class="list-group-item">Phone : {{$listing->phone}}</li>                        
                    </ul>
                    <hr>
                    <div class="card">
                        {{$listing->bio}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection