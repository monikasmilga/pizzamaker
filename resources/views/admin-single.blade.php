@extends('admin')

<div>Admin Single</div>

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach($record as $key => $value)
            <tr><td> {{ $key }} </td>
            <td> {{$value}}</td></tr>
        @endforeach
        </tbody>
    </table>
    <td><a href="{{route($routeEdit, $record['id'])}}"><button> edit</button></a></td>
    <td><a onclick="deleteItem('{{route($routeShow, $record['id'])}}')"><button> delete</button></a></td>

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function(){
                    alert('DELETED');
                },
                error: function(){
                    alert('ERROR');
                }
            });
        }

    </script>
@endsection