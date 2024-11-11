@section('title', 'Lista klientów')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista klientów') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Pole wyszukiwania -->
                <div class="flex justify-between mb-4">
                    <input type="text" id="search" placeholder="Szukaj po imieniu lub nazwisku"
                           class="w-full p-2 border border-gray-300 rounded-lg focus:border-blue-500">
                    <a href="{{ route('clients.create') }}" class="ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Dodaj klienta
                    </a>
                </div>

                <!-- Miejsce na tabelę klientów -->
                <div id="clientTable">
                    @include('clients.partials.client_table', ['clients' => $clients])
                </div>
            </div>
        </div>
    </div>

    <!-- Modal szczegółów klienta -->
    <div id="clientModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Szczegóły klienta</h3>
            <div id="clientDetails" class="text-gray-700 dark:text-gray-300">
                <!-- Szczegóły klienta zostaną wstawione tutaj przez JavaScript -->
            </div>
            <div class="mt-4 flex justify-end">
                <button onclick="closeModal()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Zamknij
                </button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('search').addEventListener('input', function() {
            const query = this.value;
            loadTable(`{{ route('clients.search') }}?query=${query}`);
        });

        // Funkcja do ładowania tabeli przez AJAX
        function loadTable(url) {
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(html => {
                    document.getElementById('clientTable').innerHTML = html;
                    setupPaginationLinks(); // Przypisanie zdarzenia kliknięcia do linków paginacji
                })
                .catch(error => console.log(error));
        }

        // Przypisuje zdarzenie kliknięcia do linków paginacji
        function setupPaginationLinks() {
            document.querySelectorAll('#clientTable .pagination a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    loadTable(this.href); // Załaduj stronę przez AJAX
                });
            });
        }

        // Wywołanie funkcji, aby ustawić zdarzenie przy pierwszym ładowaniu strony
        setupPaginationLinks();

        function showModal(client) {
            document.getElementById('clientModal').classList.remove('hidden');
            document.getElementById('clientDetails').innerHTML = `
                <p><strong>Imię:</strong> ${client.first_name}</p>
                <p><strong>Nazwisko:</strong> ${client.last_name}</p>
                <p><strong>Email:</strong> ${client.email}</p>
                <p><strong>Telefon:</strong> ${client.phone}</p>
                <p><strong>Wiek:</strong> ${client.age_range}</p>
                <p><strong>Płeć:</strong> ${client.gender}</p>
                <p><strong>Data pierwszego kontaktu:</strong> ${client.first_contact_date}</p>
                <p><strong>Data ostatniego kontaktu:</strong> ${client.last_contact_date}</p>
                <p><strong>Opis:</strong> ${client.description}</p>
                <p><strong>Uwagi specjalne:</strong> ${client.special_notes}</p>
            `;
        }

        function closeModal() {
            document.getElementById('clientModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
