@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clippings</div>

                <div class="panel-body">
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
