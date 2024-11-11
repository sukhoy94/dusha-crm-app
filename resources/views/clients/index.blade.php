@section('title', 'Lista klientów')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Klienci') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Lista klientów</h1>

                    <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Dodaj klienta
                    </a>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 shadow rounded-lg">
                            <thead class="bg-gray-100 text-gray-600 text-sm uppercase font-semibold">
                            <tr>
                                <th class="py-3 px-6 text-left">Imię</th>
                                <th class="py-3 px-6 text-left">Nazwisko</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Telefon</th>
                                <th class="py-3 px-6 text-left">Wiek</th>
                                <th class="py-3 px-6 text-left">Płeć</th>
                                <th class="py-3 px-6 text-center">Akcje</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                            @foreach($clients as $client)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6">{{ $client->first_name }}</td>
                                    <td class="py-3 px-6">{{ $client->last_name }}</td>
                                    <td class="py-3 px-6">{{ $client->email }}</td>
                                    <td class="py-3 px-6">{{ $client->phone }}</td>
                                    <td class="py-3 px-6">{{ $client->age_range }}</td>
                                    <td class="py-3 px-6">{{ $client->gender }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('clients.edit', $client) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded">
                                                Edytuj
                                            </a>
                                            <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                                    Usuń
                                                </button>
                                            </form>
                                        </div>
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
