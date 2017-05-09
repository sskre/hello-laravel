@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit tag
                    {!! Form::model($tag, ['route' => ['tag.destroy', $tag->id], 'method' => 'DELETE', 'id' => 'destroy-model', 'class' => 'pull-right']) !!}
                    <button type='button' class='btn btn-danger btn-xs destroy'><span class='glyphicon glyphicon-trash'></span></button>
                    {!! Form::close() !!}
                </div>

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
                    {!! Form::model($tag, ['route' => ['tag.update', $tag->id], 'method' => 'PUT']) !!}
                    {!! Form::label('name', 'Tag Name') !!}
                    {!! Form::text('name') !!}
                    {!! Form::submit('Update tag') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.notification.dialog')
@endsection
