@forelse($statuses as $status)

    @include('statuses.partials.status')

@empty

    <p>No statuses has been posted yet.</p>

@endforelse

