@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clippings <a href='{{ route('clipping.create') }}' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-plus'></span></a></div>

                <div class="panel-body">
@if (Session::has('notification'))
@if (Session::get('notification.level') == 'error')
@include('layouts.notification.error', ['message' => Session::get('notification.message')])
@endif
@if (Session::get('notification.level') == 'info')
@include('layouts.notification.info', ['message' => Session::get('notification.message')])
@endif
@endif
@forelse ($clippings as $clipping)
@if ($loop->first)
                    <ul>
@endif
                        <li>
                            <a href='{{ route('clipping.edit', [$clipping->id]) }}' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-pencil'></span></a> <a href='{{ $clipping->url }}' target='_blank'>{{ $clipping->title }}</a> Posted by {{ $clipping->user->name }}
@foreach ($clipping->tags as $tag)
                            <span class="label label-info">{{ $tag->name }}</span>
@endforeach
                        </li>
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
