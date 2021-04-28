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
        <li><a href="{{ URL::to('voyants/create') }}">Create a voyant</a>
    </ul>
</nav>

<h1>détails de  {{ $voyant->name }}</h1>

    <div class="jumbotron text-center">
        <h2>biographie</h2>
        <p>
            {{ $voyant->biography }}<br>
            <strong>Note Globale:</strong> {{ $voyant->note }}
        </p>
        <br><br>
        <a class="btn btn-small btn-info" href="{{ URL::to('voyants/' . $voyant->id . '/edit') }}">Modifier</a>

    </div>

</div>
</body>
</html>