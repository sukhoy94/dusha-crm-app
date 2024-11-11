<div class="mb-6 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Filtry</h3>

    <!-- Pole wyszukiwania -->
    <div class="flex items-center mb-4">
        <input type="text" id="search" placeholder="Szukaj po imieniu lub nazwisku"
               class="w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500" />
    </div>

    <!-- Przycisk dodaj klienta -->
    <div class="flex justify-end">
        <a href="{{ route('clients.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Dodaj klienta
        </a>
    </div>
</div>
