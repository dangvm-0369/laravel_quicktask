<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="mt-4">
                <x-input-label for="car" :value="__('Car')" />

                <x-text-input id="car" class="block mt-1 w-full"
                    type="text"
                    name="car"
                    required autocomplete="car" />

                <x-input-error :messages="$errors->get('car')" class="mt-2"/>
            </div>
            <x-primary-button class="mt-4">
                {{ __('+') }}
            </x-primary-button>
        </div>
    </div>
</x-app-layout>
