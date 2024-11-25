<div x-data="{
        children: [],
        showChildForm: false,
        addChild() {
            this.children.push({ first_name: '', last_name: '', age: null, birth_date: '', notes: '' });
            this.showChildForm = false; // Ukrycie formularza po dodaniu dziecka
        },
        removeChild(index) {
            this.children.splice(index, 1); // Usunięcie dziecka z listy
        }
    }">
    <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 font-bold">Dodaj dziecko</h3>

    <!-- Przycisk do pokazania formularza -->
    <div class="mt-6">
        <button type="button" @click="showChildForm = true" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Dodaj dziecko
        </button>
    </div>

    <!-- Formularz dodawania dziecka -->
    <div x-show="showChildForm" class="mt-4 border rounded p-4 bg-gray-100 dark:bg-gray-800">
        <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-4">Nowe dziecko</h4>
        <div class="space-y-4">
            <div>
                <label for="new_child_first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>
                <input type="text" id="new_child_first_name" x-model="children[children.length - 1]?.first_name"
                       class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
            </div>
            <div>
                <label for="new_child_last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>
                <input type="text" id="new_child_last_name" x-model="children[children.length - 1]?.last_name"
                       class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
            </div>
            <div>
                <label for="new_child_age" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wiek</label>
                <input type="number" id="new_child_age" x-model="children[children.length - 1]?.age"
                       class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
            </div>
            <div>
                <label for="new_child_birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data urodzenia</label>
                <input type="date" id="new_child_birth_date" x-model="children[children.length - 1]?.birth_date"
                       class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
            </div>
            <div>
                <label for="new_child_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                <textarea id="new_child_notes" x-model="children[children.length - 1]?.notes" rows="3"
                          class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"></textarea>
            </div>
        </div>
        <div class="mt-4 flex items-center space-x-4">
            <button type="button" @click="addChild()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Dodaj
            </button>
            <button type="button" @click="showChildForm = false" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Anuluj
            </button>
        </div>
    </div>

    <!-- Lista dodanych dzieci -->
    <div class="mt-6">
        <h4 class="text-md font-medium text-gray-700 dark:text-gray-300 mb-2">Lista dzieci</h4>
        <template x-for="(child, index) in children" :key="index">
            <div class="flex justify-between items-center border rounded p-4 bg-gray-100 dark:bg-gray-800 mt-2">
                <div>
                    <p><strong>Imię:</strong> <span x-text="child.first_name"></span></p>
                    <p><strong>Nazwisko:</strong> <span x-text="child.last_name"></span></p>
                    <p><strong>Wiek:</strong> <span x-text="child.age"></span></p>
                </div>
                <button type="button" @click="removeChild(index)" class="text-red-500 hover:underline">Usuń</button>
            </div>
        </template>
        <div x-show="children.length === 0" class="text-gray-500 dark:text-gray-400 mt-4">Brak dodanych dzieci.</div>
    </div>
</div>
