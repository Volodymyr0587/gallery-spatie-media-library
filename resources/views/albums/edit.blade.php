<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Album') }}: {{ $album->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">

                            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                                <form action="{{ route('albums.update', $album) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                  <div class="sm:col-span-6">
                                    <label for="title" class="block text-sm font-medium text-gray-700"> Album Title </label>
                                    <div class="mt-1">
                                      <input type="text" id="title" name="title" value="{{ old('title', $album->title) }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5" />
                                    </div>
                                    @error('title')
                                    <span class="mt-2 text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-4">
                                        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                                            Update
                                        </button>
                                    </div>
                                  </div>
                                </form>
                              </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
