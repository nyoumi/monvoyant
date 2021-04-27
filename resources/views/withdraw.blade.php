<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Withdraw') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-card>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

                    <form method="POST" action="{{ route('withdraw') }}">
                    @csrf

                    <!-- Deposit Amount -->
                        <div>
                            <x-label for="amount" :value="__('Amount')"></x-label>

                            <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required autofocus></x-input>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
            </div>
        </div>
    </div>
</x-app-layout>
