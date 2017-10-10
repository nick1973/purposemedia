@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Runners</div>

                    <div class="panel-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Forename</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($runners as $runner)
                                <?php
                                $dt = \Carbon\Carbon::createFromFormat('Y-m-d', $runner->dob)->format('d-m-Y');
                                ?>
                                <tr>
                                    <td>{{ $runner->forename }}</td>
                                    <td>{{ $runner->surname }}</td>
                                    <td>{{ $runner->email }}</td>
                                    <td>{{ $dt }}</td>
                                    <td><a class="btn btn-info" href="/runners/{{ $runner->id }}/edit">Edit</a></td>
                                    <td>{!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['runners.destroy', $runner->id]
                                        ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $runners->links() }}
                    </div>
                </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Create Runner</div>
                        <div class="panel-body">
                            {!! Form::open(['url' => 'runners']) !!}
                                {{ Form::label('forename', 'Forename', ['class' => 'label-control', 'required']) }}
                                {{ Form::text('forename', null, ['class' => 'form-control']) }}
                                {{ Form::label('surname', 'Surname', ['class' => 'label-control']) }}
                                {{ Form::text('surname', null, ['class' => 'form-control']) }}
                                {{ Form::label('email', 'Email', ['class' => 'label-control']) }}
                                {{ Form::text('email', null, ['class' => 'form-control']) }}
                                {{ Form::label('dob', 'DOB', ['class' => 'label-control']) }}
                                {{ Form::date('dob', null, ['class' => 'form-control']) }}
                                </br>
                                {{ Form::submit('Add Runner', ['class' => 'btn btn-success']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection