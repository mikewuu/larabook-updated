<article class="media status-media">
    <div class="pull-left">
        <img class="media-object" src="{{ $status->user->present()->gravatar }}" alt="{{ $status->user->name }}">
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $status->user->name }}</h4>
        <p>{{ $status->present()->timeSincePublished }}</p>
    </div>
    {{ $status->body }}
</article>