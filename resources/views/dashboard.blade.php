<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        @can('role-create')

                            <li><a class="nav-link" href="{{ route('users.index') }}">Gérer les utilisateurs</a></li>

                            <li><a class="nav-link" href="{{ route('roles.index') }}">Gérer les Rôles et droits</a></li>
                            @endcan

                            <li><a class="nav-link" href="{{ route('voyants.index') }}">Gérer les voyants</a></li>
                            <li class="nav-item dropdown">
                            </li>
                        @endguest
                    
            </div>
        </div>
    </div>
</x-app-layout>
