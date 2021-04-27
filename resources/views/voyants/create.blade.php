@extends('layouts.master')

@section('content')

<h1>Ajouter un voyant</h1>  
<p class="lead">Remplissez les informations du voyant.</p>
<hr>

{!! Form::open([
    'route' => 'voyants.store'
]) !!}

<div class="form-group">
    {!! Form::label('nom', 'Nom:', ['class' => 'control-label']) !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('biographie', 'Biographie:', ['class' => 'control-label']) !!}
    {!! Form::textarea('biographie', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!

@stop