@extends('layouts.app')
@section('content')

    <div class="top-right links">
        @if (Auth::check())
            {!! Form::open(['url' => route('front-end.game.store'), 'files' => true]) !!}
            {{ Form::file('thefile') }}
            {!! Form::submit('Upload' , ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
@endsection