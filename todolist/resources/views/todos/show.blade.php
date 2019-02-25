@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go Back</a>    
    <h3>{{$todo->text}}</h3>

    <div class="text text-danger">{{$todo->due}}</div>
    <hr />
    <p>{{$todo->body}}</p>
    <br><br>
    <a href="/todo/{{$todo->id}}/edit" class="btn btn-default">Edit<a/>
        {!! Form::open(['action' => ['TodosController@destroy', $todo->id], 'method' => 'POST', 'class' => 'float-right']) !!}        
            {{ Form::hidden('_method', 'DELETE') }}          
            {{ Form::bsSubmit('Delete', ['class' => 'btn btn-primary']) }}
        {!! Form::close() !!}
@endsection