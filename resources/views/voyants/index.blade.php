<!DOCTYPE html>
<html>
<head>
    <title>voyants</title>
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
<a class="btn btn-primary" href="{{ route('dashboard') }}"> Accueil</a>

<h1>Tous les voyants</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>nom</td>
            <td>biographie</td>
            <td>note</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($voyants as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->biography }}</td>
            <td>{{ $value->note }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the voyant (uses the destroy method DESTROY /voyants/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
     

                <!-- show the voyant (uses the show method found at GET /voyants/{id} -->
                <a class="btn btn-small btn-success" style="margin-bottom:10px" href="{{ URL::to('voyants/' . $value->id) }}">Voir </a>
                @can('voyant-edit')

                <!-- edit this voyant (uses the edit method found at GET /voyants/{id}/edit -->
                <a class="btn btn-small btn-info" style="margin-bottom:10px" href="{{ URL::to('voyants/' . $value->id . '/edit') }}">Modifier</a>
                @endcan
                @csrf
                @method('DELETE')
                @can('voyant-delete')

                    {{ Form::open(array('url' => 'voyants/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
                @endcan

                {{ Form::close() }}
                </td>

        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>

</html>