@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new tag</div>

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
                    {!! Form::open(['route' => 'tag.store', 'method' => 'POST']) !!}
                    {!! Form::label('name', 'Tag Name') !!}
                    {!! Form::text('name') !!}
                    {!! Form::submit('Add tag') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
