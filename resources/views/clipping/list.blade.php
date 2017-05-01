@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clippings <a href='{{ url('clipping/create') }}' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-plus'></span></a></div>

                <div class="panel-body">
@if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        <span class="sr-only">Info:</span>
                        {{ Session::get('message') }}
                    </div>
@endif
@forelse ($clippings as $clipping)
@if ($loop->first)
                    <ul>
@endif
                        <li><a href='{{ $clipping->url }}' target='_blank'>{{ $clipping->title }}</a></li>
@if ($loop->last)
                    </ul>
@endif
@empty
                    {{ __('message.no_item') }}
@endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
