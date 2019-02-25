@extends('layouts.app')

@section('content')
    <h1>Todos</h1>
    @if(count($todos) > 0)
        @foreach($todos as $t)
            <div class="card card-body bg-light">
                <h3><a href="todo/{{$t->id}}"> {{$t->text}}</a> <span class="text text-danger">{{$t->due}}</span></h3>
                
            </div>
        @endforeach
    @endif
@endsection