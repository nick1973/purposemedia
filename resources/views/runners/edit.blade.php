@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Runner</div>
                    <div class="panel-body">
                        {{ Form::model($runner, ['route' => ['runners.update', $runner->id], 'class' => '', 'method' => 'PATCH']) }}
                        {{ Form::label('forename', 'Forename', ['class' => 'label-control', 'required']) }}
                        {{ Form::text('forename', null, ['class' => 'form-control']) }}
                        {{ Form::label('surname', 'Surname', ['class' => 'label-control']) }}
                        {{ Form::text('surname', null, ['class' => 'form-control']) }}
                        {{ Form::label('email', 'Email', ['class' => 'label-control']) }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                        {{ Form::label('dob', 'DOB', ['class' => 'label-control']) }}
                        {{ Form::date('dob', null, ['class' => 'form-control']) }}
                        </br>
                        {{ Form::submit('Edit Runner', ['class' => 'btn btn-success']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection