<article class="media status-media">
    <div class="pull-left">
        @include('users.partials.avatar' , ['size' => '30', 'user' => $status->user, 'shape' => 'square'])
    </div>

    <div class="media-body status-media-body">
        <h4 class="media-heading status-media-heading">{{ $status->user->name }}</h4>
        <p><small class="status-media-time">{{ $status->present()->timeSincePublished }}</small></p>
    {{ $status->body }}
    </div>
</article>

@if(Auth::check())
    {!! Form::open(['url' => 'statuses/' . $status->id . '/comments', 'class' => 'comments-create-form']) !!}
    {!! Form::hidden('status_id', $status->id ) !!}
    <!-- Body Form Input -->
    <div class="form-group">
        {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 1]) !!}
    </div>

    {!! Form::close() !!}
    @endif

@unless ($status->comments->isEmpty())
    <div class="comments">
        @foreach($status->comments as $comment)
        @include('statuses.partials.comments')
            @endforeach
    </div>
    @endunless