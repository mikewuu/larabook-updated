@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    @include('users.partials.avatar', ['size' => 50])
                </div>

                <div class="media-body">
                    <h1 class="media-heading">{{ $user->name }}</h1>
                    <ul class="list-inline">
                        <li>{{ $user->present()->statusCount }}</li>
                        <li>{{ $user->present()->followersCount }}</li>
                    </ul>


                    @foreach($user->followers as $follower)

                        @include('users.partials.avatar', ['size' => 25, 'user' => $follower])

                    @endforeach

                </div>


            </div>


        </div>
        <div class="col-md-6">

            @unless($user->is(Auth::user()))
                @include('users.partials.follow-form')
            @endunless

            @if($user->is(Auth::user()))
                @include('statuses.partials.publish-status-form')
            @endif

            @include('statuses.partials.statuses' ,['statuses' => $user->statuses])
        </div>
    </div>
@stop