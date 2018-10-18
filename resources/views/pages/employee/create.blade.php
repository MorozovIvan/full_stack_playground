@extends('layouts.main')

@section('content')
    <!-- content -->
    <div id="content" class="container" role="main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => 'employees.store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('first_name', 'First Name') !!}
                {!! Form::text('first_name', null, ['placeholder' => 'Enter...', 'class' => 'form-control', 'aria-describedby' => 'Enter...']) !!}
                <small id="firstNameHelp" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                {!! Form::label('last_name', 'Last Name') !!}
                {!! Form::text('last_name', null, ['placeholder' => 'Enter...', 'class' => 'form-control', 'aria-describedby' => 'Enter...']) !!}
                <small id="lastNameHelp" class="form-text text-muted"></small>
            </div>

            <file-upload></file-upload>

        <project-select dynamic_field_id="{!! $dynamicFeatureId !!}"></project-select>

        {!! Form::submit('Create employee', ['class' => 'btn btn-success']); !!}

        {!! Form::close() !!}

    </div>
@endsection
