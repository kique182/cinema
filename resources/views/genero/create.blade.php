@extends('layouts.admin')
    @section('content')
        {!! Form::open() !!}
        <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Género agregado exitosamente</strong>
        </div>
        <div id="msj-error" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong id="msj"></strong>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            @include('genero.form.genero')
        {!! link_to('#',$title='Guardar',$attributes=['id'=>'registro','class'=>'btn btn-primary'],$secure=null ) !!}
        {!! Form::close() !!}
        @endsection
@section('scripts')
    {!! Html::script('js/script.js') !!}
@endsection