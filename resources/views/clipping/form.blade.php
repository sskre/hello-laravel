@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new clipping</div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'clipping.store', 'method' => 'POST']) !!}
                    {!! Form::label('url', 'URL') !!}
                    {!! Form::text('url') !!}
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title') !!}
                    {!! Form::submit('Add clipping') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
