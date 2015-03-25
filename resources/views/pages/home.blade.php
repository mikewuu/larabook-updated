@extends('app')

@section('content')
    <div class="jumbotron">
        <h1>Welcome To larabook!</h1>
        <p>Welcome to the best place to talk about Laravel with others. </p>
        <p>Why don't you sign up to see what it's all about.</p>
        <p>
            <a class="btn btn-lg btn-primary" href="{{ url('/auth/register') }}" role="button">Sign Up &raquo;</a>
        </p>
    </div>
    @stop

