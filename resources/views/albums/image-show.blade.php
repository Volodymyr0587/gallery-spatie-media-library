<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Image') }} - {{ $image->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <img class="object-cover object-center w-full h-full block"
                                src="{{ asset('storage/' . $image->id . '/' . $image->file_name) }}" alt="">
                        </div>
                        <div class="mt-4">
                            <ul>
                                <li>Collection name: {{ $image->collection_name }}</li>
                                <li>Name: {{ $image->name }}</li>
                                <li>Type: {{ $image->mime_type }}</li>
                                <li>Size: {{ $image->human_readable_size }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
