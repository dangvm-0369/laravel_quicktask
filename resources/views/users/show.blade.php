<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-medium" style="text-transform: capitalize">
                        {{ __("User Information") }}
                    </h3>
                    <table class="table mt-4">
                        <thead>
                        <tr>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('User Name') }} </th>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('First Name') }} </th>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Last Name') }} </th>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Email') }} </th>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Roles') }} </th>
                            <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Action') }} </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->username }}</td>
                                <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->first_name }}</td>
                                <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->last_name }}</td>
                                <td class="text-gray-900 dark:text-gray-100 text-center">{{ $user->email}}</td>
                                <td class="text-gray-900 dark:text-gray-100 text-center" style="text-transform: capitalize">
                                    @foreach($user->roles as $role)
                                        {{ __($role->name) }}
                                        <br>
                                    @endforeach
                                </td>
                                <td class="text-gray-900 dark:text-gray-100 text-center">
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
                        </tbody>
                    </table>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 mt-4">
                    <x-primary-button class="mb-4" onclick="location.href='{{ route('cars.create', [$user->id])}}'">
                        {{__('Create New Car')}}
                    </x-primary-button>
                    <h3 class="font-medium" style="text-transform: capitalize">
                        {{ __("Cars List") }}
                    </h3>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th class="text-gray-900 dark:text-gray-100" scope="col"> # </th>
                                <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('ID') }} </th>
                                <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Car Name') }}  </th>
                                <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Cost') }}  </th>
                                <th class="text-gray-900 dark:text-gray-100" scope="col"> {{ __('Action') }}  </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->cars as $index => $car )
                                <tr>
                                    <th class="text-gray-900 dark:text-gray-100 text-center" scope="row">{{ ++$index  }}</th>
                                    <td class="text-gray-900 dark:text-gray-100 text-center">{{ $car->id }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 text-center">{{ $car->name }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 text-center">{{ $car->cost . '$' }}</td>
                                    <td class="text-gray-900 dark:text-gray-100 text-center">
                                        <x-primary-button class="mt-4" onclick="location.href='{{ route('cars.edit', ['car' => $car->id]) }}'">
                                            {{__('Edit')}}
                                        </x-primary-button>
                                        <form method="post" action="{{route('cars.destroy', ['car' => $car->id])}}">
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

        </div>
    </div>
</x-app-layout>
