@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new clipping</div>

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
                    <form method="POST" action="{{ route('clipping.store') }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <label for="url">URL</label>
                        <input name="url" type="text" value="{{ old('url') }}" id="url">
                        <label for="title">Title</label>
                        <input name="title" type="text" value="{{ old('title') }}" id="title">
                        <input type="submit" value="Add clipping">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
