@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($times->count() > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">Today's Times</div>

                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Pos</th>
                                    <th>Forename</th>
                                    <th>Surname</th>
                                    <th>Time</th>
                                    <th></th>
                                </tr>
                                @foreach($times as $time)
                                    <tr>
                                        <td></td>
                                        <td>{{ $time->forename }}</td>
                                        <td>{{ $time->surname }}</td>
                                        <td>{{ $time->time }}</td>
                                        <td>
                                            {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['time.destroy', $time->id]
                                            ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Time Input</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'time', 'class' => 'form-inline']) !!}
                        {{ Form::label('time', 'Time', ['class' => 'label-control']) }}
                        {{ Form::text('time', null, ['class' => 'form-control']) }}
                        {{ Form::label('runner', 'Runner', ['class' => 'label-control']) }}
                        <select class="form-control" name="runner_id">
                            <option></option>
                            @foreach($runners as $runner)
                            <option value="{{ $runner->id }}">{{ $runner->forename }} {{ $runner->surname }}</option>
                            @endforeach
                        </select>
                        {{ Form::submit('Input Time', ['class' => 'btn btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
