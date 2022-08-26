<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user ') }}{{$user->username}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops! Something went wrong!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('editUser', $user->id) }}">
                        @method('POST')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" class="block mt-2 w-full" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') ?? $user->name }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" class="block mt-2 w-full" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') ?? $user->email }}" autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="new_password" :value="__('New password')" />
                                    <x-input id="new_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" />
                                </div>
                                <div>
                                    <x-label for="confirm_password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation"
                                             autocomplete="confirm-password" />
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="role" :value="__('Role')" class="block mt-2 w-full"/>
                                    <select name="role" id="role" class="block mt-1 w-full">
                                        <option value="{{ old('role', null) }}" >{{ __('Choose an option') }}</option>
                                        <option value="{{ old('role', 'admin') }}" @if ($user->role == 'admin') selected @endif>admin</option>
                                        <option value="{{ old('role', 'user') }}" @if ($user->role == 'user') selected @endif>user</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-3" type="submit">
                                {{ __('Update user') }}
                            </x-button>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <a href="{{ route('deleteUser',$user->id) }}" class="text-red-600 hover:text-indigo-900">Delete User</a>
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <a href="{{ route('dashboard') }}" class="text-red-600 hover:text-indigo-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
