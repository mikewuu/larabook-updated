@if($user->isFollowedby(Auth::user()))
   {!! Form::open(['url' => 'follows/' . $user->id, 'method' => 'DELETE']) !!}
   {!! Form::hidden('userIdToUnfollow', $user->id ) !!}
   <!-- Submit -->
   <div class="form-group">
       {!! Form::submit('Unfollow ' . $user->name, ['class' => 'btn btn-danger form-control']) !!}
   </div>
   {!! Form::close() !!}
    @else
{!! Form::open(['url' => 'follows']) !!}
{!! Form::hidden('userIdToFollow', $user->id ) !!}
<!-- Submit -->
<div class="form-group">
    {!! Form::submit('Follow ' . $user->name, ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
    @endif
