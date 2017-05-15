@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit clipping
                    {!! Form::model($clipping, ['route' => ['clipping.destroy', $clipping->id], 'method' => 'DELETE', 'id' => 'destroy-model', 'class' => 'pull-right']) !!}
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
                    {!! Form::model($clipping, ['route' => ['clipping.update', $clipping->id], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('url', 'URL') !!}
                        {!! Form::text('url', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Tags') !!}
                        {!! Form::select('tags[]', $tags, $clipping->tags->pluck('id')->all(), ['multiple' => true, 'class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Update clipping') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.notification.dialog')
@endsection
