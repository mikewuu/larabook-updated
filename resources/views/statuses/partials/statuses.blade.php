@if($statuses->count())
    @foreach($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
@else
    <p>This user hasn't posted a status yet</p>
@endif