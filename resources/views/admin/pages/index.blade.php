
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 ">
            {{ __('Pages') }}
        </h2>
    </x-slot>

    <div class="container px-4 mx-auto sm:px-8">
        <div class="py-8">
            <div class="flex flex-col justify-end my-2 sm:flex-row">
                <div class="relative block">
                    <a href="{{ route('admin.pages.create') }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded shadow hover:bg-blue-700">
                        Add New Page
                    </a>
                </div>
            </div>
            <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Title
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Content
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach($pages as $page)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="text-sm leading-5 text-gray-900">{{ $page->title }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="text-sm leading-5 text-gray-900">{{ $page->content }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        {{-- <a href="{{ route('admin.pages.show', $page) }}" class="text-indigo-600 hover:text-indigo-900">View</a> --}}
                                        <a href="{{ route('admin.pages.edit', $page) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form class="inline-block" action="{{ route('admin.pages.destroy', $page) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-600 hover:text-red-900">Delete</button>
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
    </div>
</x-app-layout>


