<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create ride') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Form has errors:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-600">- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('createRide') }}">
                        @method('POST')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="start_time" :value="__('StartTime')" class="block mt-2 w-full" />
                                    <x-input id="start_time" class="block mt-1 w-full" type="datetime-local" name="start_time" value="{{ old('start_time', '') }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="end_time" :value="__('EndTime')" class="block mt-2 w-full" />
                                    <x-input id="end_time" class="block mt-1 w-full" type="datetime-local" name="end_time" value="{{ old('end_time', '') }}" autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="type" :value="__('Type')" class="block mt-2 w-full"/>
                                    <select name="type" id="state" class="block mt-1 w-full">
                                        <option value="{{ old('type', null) }}" selected disabled hidden>{{ __('Choose an option') }}</option>
                                        <option value="{{ old('type', 'offer') }}">offer</option>
                                        <option value="{{ old('type', 'request') }}">request</option>
                                    </select>
                                </div>
                                <div>
                                    <x-label for="user1_id" :value="__('User1')" class="block mt-2 w-full" />
                                    <x-input id="user1_id" class="block mt-1 w-full" type="number" name="user1_id" min="1" value="{{ old('user1_id', '')}}" autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-2 gap-6">
                                <h6 class="font-semibold mt-2 text-gray-600">Startlocation</h6>
                                <div class="flex flex-row flex-nowrap justify-between">
                                    <div class="w-full mr-2">
                                        <x-label for="lat_start" :value="__('Latitude Start')" />
                                        <x-input id="lat_start" class="block mt-2 w-full" type="number" name="lat_start" step="any" min="-90" max="90" value="{{ old('lat_start', '') }}" autofocus />
                                    </div>
                                    <div class="w-full ml-2">
                                        <x-label for="lng_start" :value="__('Longitude Start')" />
                                        <x-input id="lng_start" class="block mt-2 w-full" type="number" name="lng_start" step="any" min="-180" max="180" value="{{ old('lng_start', '') }}" autofocus />
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-rows-2 gap-6">
                                <h6 class="font-semibold mt-2 text-gray-600">Destination</h6>
                                <div class="flex flex-row flex-nowrap justify-between">
                                    <div class="w-full mr-2">
                                        <x-label for="lat_destination" :value="__('Latitude Start')" />
                                        <x-input id="lat_destination" class="block mt-2 w-full" type="number" name="lat_destination" step="any" min="-90" max="90" value="{{ old('lat_destination', '') }}" autofocus />
                                    </div>
                                    <div class="w-full ml-2">
                                        <x-label for="lng_destination" :value="__('Longitude Start')" />
                                        <x-input id="lng_destination" class="block mt-2 w-full" type="number" name="lng_destination" step="any" min="-180" max="180" value="{{ old('lng_destination', '') }}" autofocus />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-button class="ml-3" type="submit">
                                {{ __('Create ride') }}
                            </x-button>
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
