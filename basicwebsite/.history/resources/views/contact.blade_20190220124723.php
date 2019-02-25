@extends('layouts.app')

@section('content')
    <h1>Content</h1>
    {!! Form::open(['url' => 'contact/submit']) !!}    
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'E-Mail Address')}}
            {{Form::text('email', "")}}
        </div>
        <div class="form-group">
            {{Form::label('message', 'Message')}}
            {{Form::textArea('message', "")}}
        </div>
    {!! Form::close() !!}
@endsection