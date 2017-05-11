@extends('admin')

<div>Admin List</div>

@section('content')

    <table class="table">
        <thead>
        <tr>
            @foreach($list[0] as $key => $value)
                <th> {{ $key }}</th>

            @endforeach
            <th> view</th>
            <th> edit</th>
            <th> delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key => $record)
            <tr>
                @foreach($record as $key => $value)
                    <td>
                        {{ $value }}
                    </td>
                @endforeach
                <td><a href="{{route($routeShow, $record['id'])}}"><button> view</button></a></td>
                <td><a href="{{route($routeEdit, $record['id'])}}"><button> edit</button></a></td>
                <td><a onclick="deleteItem('{{route($routeShow, $record['id'])}}')"><button> delete</button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
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