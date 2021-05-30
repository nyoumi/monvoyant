<x-app-layout>
    <x-slot name="header">
    <div class="container">
  <div class="row">
    <div class="col-sm">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>    </div>
    <div class="col-sm">
    {{ __('Crédits: ') }} {{ $accountUser->balance }}


    </div>
    <div class="col-sm">
        <div class="pull-right" style="text-align: right;"> 
        <a class="btn btn-primary" href="{{ route('pay') }}"> Souscrire pack 1</a>

        </div>

    </div>
  </div>
</div>
    </x-slot>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Authentication Links -->
                        <ul>

                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        @can('role-create')

                            <li><a class="nav-link" href="{{ route('users.index') }}">Gérer les utilisateurs</a></li>

                            <li><a class="nav-link" href="{{ route('roles.index') }}">Gérer les Rôles et droits</a></li>
                            @endcan

                            <li><a class="nav-link" href="{{ route('voyants.index') }}">Voir les voyants</a></li>
                            
                        @endguest

                        @can('role-create')
                        <a class="btn btn-small btn-info" href="{{ URL::to('chat/4') }}">se connecter en tant que voyant</a>

                        @endcan
                        </ul>
                    
            </div>
        </div>
    </div>
</x-app-layout>
