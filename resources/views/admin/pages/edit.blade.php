<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 ">
            {{ __('Create New Page') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-gray-400 border-dashed rounded-lg">
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Page Creation Form -->
                <form class="w-full max-w-xl py-8 mx-auto" action="{{ route('admin.pages.update', $page) }}" method="POST" >
                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="title">
                                Title
                            </label>
                            <input class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none focus:outline-none focus:bg-white" id="title" type="text" name="title" value="{{ $page->title}}" required>
                        </div>
                    </div>

                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="content">
                                Content
                            </label>
                            <textarea class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500" id="content" name="content" rows="10" required>{{ $page->content}}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-wrap mb-6 -mx-3">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Save
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
