@extends('welcome')

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($account) ? 'Edit Account' : 'Create Account' }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <!-- Modal -->
    @if (isset($account))
        {!! Form::model($account, ['route' => ['accounts.update', $account->id], 'method' => 'PUT']) !!}
    @else
        {!! Form::model(null, ['route' =>['accounts.store'],'method' => 'POST']) !!}
    @endif

    <div class="container form-control" style="width: 100%; height: 100%;">
        @csrf

        @yield('content')

        <div class="form">
        </div>

        <div class="mb-3 mt-3">
            {!! Form::label('name', 'NAME', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control edit-input', 'id' => 'name', 'placeholder' => 'Enter your name']) !!}
        </div>

        <div class="mb-3 mt-3">
            {!! Form::label('email', 'EMAIL') !!}
            {!! Form::email('email', null, ['placeholder' => 'Enter email', 'class' => 'form-control' . (isset($account) ? ' edit-input' : ''), 'id' => 'email']) !!}
        </div>

        <div class="mb-3 mt-3">
            {!! Form::label('gender', 'GENDER', ['class' => 'form-label']) !!}
            {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'other' => 'Other'], null, ['class' => 'form-control edit-input', 'id' => 'gender']) !!}
        </div>

        <div class="mb-3 mt-3">
            {!! Form::label('contact', 'CONTACT') !!}
            {!! Form::text('contact', null, ['id' => 'contact', 'placeholder' => 'Enter your contact', 'class' => 'form-control edit-input']) !!}
        </div>

        <div class="checkbox"><br>
            {!! Form::label('hobbies', 'HOBBIES') !!}<br>

            {!! Form::checkbox('hobbies[]', 'study', false) !!}
            {!! Form::label('hobbies[]', 'STUDY') !!}<br>

            {!! Form::checkbox('hobbies[]', 'dancing', false) !!}
            {!! Form::label('hobbies[]', 'DANCING') !!}<br>

            {!! Form::checkbox('hobbies[]', 'singing', false) !!}
            {!! Form::label('hobbies[]', 'SINGING') !!}
        </div>

        <div class="mb-3 mt-3">
            {!! Form::submit(isset($account) ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}

        </div>

    </div>

    {!! Form::close() !!}
</body>

</html>
