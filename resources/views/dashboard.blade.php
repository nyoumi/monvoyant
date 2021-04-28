<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @isset($accountUser)
                        <p>Balance: {{ $accountUser->balance }}</p>
                    @endisset
                </div>
                <a class="btn btn-small btn-success" style="margin-bottom:10px" href="{{ URL::to('voyants') }}">Voir les voyants </a>

            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __('Historique des Transactions') }}

                    <table class="table-auto w-full mt-5 text-center">
                        <thead>
                        <th class="px-4 py-2">Owner</th>
                        <th class="px-4 py-2">Transaction</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Date</th>
                        </thead>
                        <tbody>
                            @foreach($accountUser->transactions as $transaction)
                                <tr>
                                    <td class="border px-4">{{ $accountUser->user->name }}</td>
                                    <td class="border px-4">
                                        @if($transaction->isDebit == 1)
                                            <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-green-500 rounded-full"> Deposit </span>
                                        @else
                                            <p class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"> Withdraw </p>
                                        @endif
                                    </td>
                                    <td class="border px-4">{{ $transaction->amount }}</td>
                                    <td class="border px-4">{{ $transaction->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if(!empty(Auth::user()->id))
                        @include('chat::directChat')
            @endif
</x-app-layout>
