<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Albums') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full m-2 p-2">
                <a href="{{ route('albums.create') }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                    Create
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm font-light text-surface">
                                <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center">ID</th>
                                        <th scope="col" class="px-6 py-4 text-center">Title</th>
                                        {{-- <th scope="col" class="px-6 py-4">Image</th> --}}
                                        <th scope="col" class="px-6 py-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($albums as $album)
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        <td class="px-6 py-4 font-medium text-center">{{ $album->id }}</td>
                                        <td class="px-6 py-4 text-center">{{ $album->title }}</td>
                                        {{-- <td class="px-6 py-4">
                                            <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" />
                                        </td> --}}
                                        <td class="px-6 py-4 text-center">
                                            Manage
                                        </td>
                                        <!-- Додаткові рядки -->
                                    </tr>
                                    @empty
                                    <tr class="border-b border-neutral-200 dark:border-white/10">
                                        No Albums Yet.
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $albums->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
