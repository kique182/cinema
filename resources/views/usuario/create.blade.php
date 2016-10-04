@extends('layouts.admin')

@section('content')
    @include('alerts.request')
    {!! Form::open(['route'=>'usuario.store','method'=>'POST']) !!}
    @include('usuario.forms.usr')
        {!! Form::submit('Registrarse',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}

    @endsection