@extends('app')

@section('content')

    @include('errors/list')

    <h1>Post a Status</h1>

    {!! Form::open() !!}
    <!-- Status Form Input -->
    <div class="form-group">
        {!! Form::label('body', 'Status:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <!-- Submit -->
    <div class="form-group">
        {!! Form::submit('Post Status', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @foreach($statuses as $status)

        <article>
            {{ $status->body }}
        </article>

    @endforeach
    @stop