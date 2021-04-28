<!DOCTYPE html>
<html>
<head>
    <title>Voyant</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('voyants') }}">voyants</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('voyants') }}">Voir tous les voyants</a></li>
        <li><a href="{{ URL::to('voyants/create') }}">Créer un voyant</a>
    </ul>
</nav>

<h1>modification {{ $voyant->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($voyant, array('route' => array('voyants.update', $voyant->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nom') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('biography', 'Biographie') }}
        {{ Form::textArea('biography', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('note', 'note') }}
        {{ Form::select('note', array('0' => 'Assigner une note', '1' => '1',
         '2' => '2', '3' => '3','4' => '4','5' => '5'), Request::input('note'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('mettre à jour!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>