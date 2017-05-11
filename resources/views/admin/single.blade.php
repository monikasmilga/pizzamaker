@extends('admin.main')

@section('content')

    <div class="container">
        <table class="table">

            <thead>
            <tr>
                @foreach($record as $key => $value)
                        <th>{{$key}}</th>
                @endforeach
            </tr>


            </thead>
            <tbody>

            <tr>
                @foreach($record as $key => $value)
                    <td>{{$value}}</td>
                @endforeach
            </tr>

            </tbody>
        </table>

        <a class="btn btn-sm btn-primary" href="{{route('app.ingredients.index')}}">Back</a>

    </div>

@endsection