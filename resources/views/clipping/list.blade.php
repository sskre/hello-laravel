@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clippings</div>

                <div class="panel-body">
                    <ul>
@foreach ($clippings as $clipping)
                        <li><a href='{{ $clipping->url }}' target='_blank'>{{ $clipping->title }}</a></li>
@endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
