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
                    <button onclick="showModal({{ json_encode($client) }})" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded">
                        Szczegóły
                    </button>
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

<!-- Linki do nawigacji między stronami -->
<div class="mt-6">
    {{ $clients->links() }}
</div>
