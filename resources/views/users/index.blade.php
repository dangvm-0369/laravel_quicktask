<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("User List") }}
                </div>
            </div>
            <x-primary-button class="mt-4">
                {{__('Create New User')}}
            </x-primary-button>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th class="text-gray-900 dark:text-gray-100" scope="col"> # </th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __("Name") }} </th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __("User Name")}} </th>
                        <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __("Action") }} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user )
                        <tr>
                            <th class="text-gray-900 dark:text-gray-100 text-center" scope="row">{{ ++$index  }}</th>
                            <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->fullName }}</td>
                            <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->username }}</td>
                            <td class="text-gray-900 dark:text-gray-100 text-center">
                                <x-secondary-button class="mt-4" onclick="location.href='{{ route('users.show', ['user' => $user->id]) }}'">
                                    {{__('Show')}}
                                </x-secondary-button>
                                <x-primary-button class="mt-4" onclick="location.href='{{ route('users.edit', ['user' => $user->id]) }}'">
                                    {{__('Edit')}}
                                </x-primary-button>
                                <form method="post" action="{{route('users.destroy', ['user' => $user->id])}}">
                                    @csrf
                                    @method('delete')
                                    <x-danger-button class="mt-4">
                                        {{__('Delete')}}
                                    </x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
