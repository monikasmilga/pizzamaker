@extends('front-end.main')

@section('content')

    <div class="container">
        <table class="table">

            <thead>
            <tr>
                <th>key</th>
                <th>value</th>
            </tr>

            </thead>
            <tbody>

            @foreach($record as $key => $value)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a class="btn btn-sm btn-primary" href="{{route('app.ingredients.index')}}">Back</a>
        <a class="btn btn-success btn-sm" href="{{route('app.ingredients.index')}}">Edit</a>
        <a class="btn btn-danger btn-sm" href="{{route('app.ingredients.index')}}">Delete</a>

    </div>

@endsection