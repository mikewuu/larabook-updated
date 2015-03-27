<article class="single_comment media status-media">
    <div class="pull-left">
        @include('users.partials.avatar' , ['size' => '30', 'user' => $comment->owner, 'shape' => 'square', 'class' => 'media-object'])
    </div>

    <div class="media-body">
        <h4 class="media-heading">{{ $comment->owner->name }}</h4>
        {{ $comment->body }}
    </div>
</article>