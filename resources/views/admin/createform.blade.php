{!! Form::open(['url' => route('app.' . $tableName . '.store')]) !!}


@foreach($fields as $field)

    @if($field)

        {!! Form::label($field, 'Enter ' . ucfirst($field . ':')) !!}
        {!! Form::text($field)!!}<br/>

    @endif

@endforeach


{!! Form::submit('Submit!') !!}

{!! Form::close() !!}

