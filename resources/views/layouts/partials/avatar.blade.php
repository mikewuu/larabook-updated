<a href="{{ url('users/' . $user->id) }}" alt="Link to user profile">
    <img class="media-object img-circle avatar" src="{{ $user->present()->gravatar( isset($size) ? $size : 30 ) }}" alt="{{ $user->name }}">
</a>
