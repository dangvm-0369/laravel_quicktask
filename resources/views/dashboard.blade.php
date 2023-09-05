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
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-4">
                <div class="max-w-xl">
                    <a href="{{route('users.index')}}">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Users') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('User List') }}
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
