@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit clipping</div>

                <div class="panel-body">
@foreach ($errors->all() as $message)
@if ($loop->first)
                    <div class="alert alert-danger" role="alert">
                        <div>
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Validation error
                        </div>
@endif
                        <div>{{ $message }}</div>
@if ($loop->last)
                    </div>
@endif
@endforeach
                    {!! Form::model($clipping, ['route' => ['clipping.update', $clipping->id], 'method' => 'PUT']) !!}
                    {!! Form::label('url', 'URL') !!}
                    {!! Form::text('url') !!}
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title') !!}
                    {!! Form::submit('Update clipping') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
