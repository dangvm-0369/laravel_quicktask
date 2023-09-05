<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $car->user->username }} : {{ __('Edit Information Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('cars.update', ['car' => $car->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="name" :value="__('Car Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $car->name }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="cost" :value="__('Cost')" />
                    <x-text-input id="cost" class="block mt-1 w-full" type="number" name="cost" value="{{ $car->cost }}" required autofocus autocomplete="cost" />
                    <x-input-error :messages="$errors->get('cost')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
