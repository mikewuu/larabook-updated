@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{{ $user->name }}</h1>

            @include('layouts.partials.avatar', ['size' => 100])


        </div>
        <div class="col-md-6">
            @if($user->current($user))
                @include('statuses.partials.publish-status-form')
            @endif

            @include('statuses.partials.statuses' ,['statuses' => $user->statuses])
        </div>
    </div>
@stop