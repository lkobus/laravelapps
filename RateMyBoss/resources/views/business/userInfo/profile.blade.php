@extends('layouts.lte')


@section('header')
    
@endsection

@section('headerDescritpion')
    informações do contato
@endsection

@section('content')        
    <page-profile></page-profile>
    
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@endsection