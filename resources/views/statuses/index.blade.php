@extends('app')

@section('content')

    <div class="row">
    <div class="col-md-6 col-md-offset-3">
    

    @include('errors/list')

        <div class="status-post">
            {!! Form::open() !!}
            <!-- Status Form Input -->
            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 3, 'placeholder' => "What's on your mind?"]) !!}
            </div>

            <!-- Submit -->
            <div class="form-group status-post-submit">
                {!! Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    @foreach($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
    </div>
    </div>
    @stop