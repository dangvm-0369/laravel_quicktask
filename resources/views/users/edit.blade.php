<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User Edit") }}
                </div>
            </div>
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full"
                                  type="text"
                                  name="name"
                                  value="{{ $user->username }}"
                                  required autocomplete="name" />

                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Save') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
