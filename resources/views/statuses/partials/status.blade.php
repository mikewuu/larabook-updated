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