@extends('layouts.app')

@section('content')
    <h1>Content</h1>
    {!! Form::open(['url' => 'contact/submit']) !!}    
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', "Enter name")}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}}
            {{Form::text('email', "example@email.com")}}
        </div>
        <div class="form-group">
            {{Form::label('message', 'Message')}}
            {{Form::mediumText('message', "Enter Message")}}
        </div>
    {!! Form::close() !!}
@endsection