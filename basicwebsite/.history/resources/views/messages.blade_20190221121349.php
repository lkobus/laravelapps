@extends('layouts.app')

@section('content')
    <h1>Messages</h1>
    @if(count($messages) > 0)
        @foreach($messages as $m)
            <ul class="list-group">
                <li class="list-group-item">Name : {{$m->name}}</li>
                <li class="list-group-item">Email : {{$m->email}}</li>
                <li class="list-group-item">Message : {{$m->message}}</li>
            </ul>
        @endforeach
    @endif
    
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the sidebar</p>
@endsection