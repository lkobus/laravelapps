@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                    <span class="float-right">
                        <a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a>
                    </span>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your listings</h3>
                    @if(count($listings) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Company</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($listings as $l)
                                <tr>
                                    <td>{{$l->name}}</td>
                                    <td><a class="btn btn-default float-right" href="/listings/{{$l->id}}/edit">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['ListingsController@destroy', $l->id], 'method' => 'POST', 'class' => 'float-left', 'onsubmit' => 'return confirm("Are you sure?")']) !!}                                            
                                            {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}                    
                                            {{ Form::hidden('_method', 'DELETE')}}
                                        {!! Form::close() !!}       
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
