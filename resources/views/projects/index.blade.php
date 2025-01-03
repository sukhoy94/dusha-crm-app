@section('title', 'Projekty')

<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mb-5">
            <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                <div>
                    <h5 class="mr-3 font-semibold dark:text-white">Lista projektów fundacji</h5>
                    <p class="text-gray-500 dark:text-gray-400">Zarządzaj projektami fundacji w jednym miejscu</p>
                </div>
                <a
                    class="bg-blue-600 flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
                    href="{{ route('projects.create') }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path
                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                    </svg>
                    Dodaj projekt
                </a>
            </div>
        </div>

        @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Udało się!</span> {{ session('success') }}
            </div>
        </div>
        @endif

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nazwa projektu
                </th>
                <th scope="col" class="px-6 py-3">
                    Akcja
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $project->title }}
                    </th>
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('projects.edit', $project) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Szczegóły</a>
                        <form
                            action="{{ route('projects.destroy', $project) }}"
                            method="POST"
                            onsubmit="return confirm('Czy na pewno chcesz usunąć projekt {{ $project->title }} ?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
