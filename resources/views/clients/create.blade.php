@section('title', 'Nowy klient')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj nowego klienta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('clients.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('first_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('last_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="additional_contact" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dodatkowy kontakt</label>
                        <textarea
                            name="additional_contact"
                            id="additional_contact"
                            rows="4"
                            class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"
                        >{{ old('additional_contact') }}</textarea>

                        @error('additional_contact')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Płeć</label>
                        <select name="gender" id="gender" class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                            <option value="">Wybierz płeć</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Mężczyzna</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Kobieta</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Inna</option>
                        </select>
                        @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="age_range" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zakres wiekowy</label>
                        <select name="age_range" id="age_range" class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                            <option value="">Wybierz zakres</option>
                            <option value="18-24" {{ old('age_range') == '18-24' ? 'selected' : '' }}>18-24</option>
                            <option value="25-30" {{ old('age_range') == '25-30' ? 'selected' : '' }}>25-30</option>
                            <option value="31-39" {{ old('age_range') == '31-39' ? 'selected' : '' }}>31-39</option>
                            <option value="40-50" {{ old('age_range') == '40-50' ? 'selected' : '' }}>40-50</option>
                            <option value="50+" {{ old('age_range') == '50+' ? 'selected' : '' }}>50+</option>
                        </select>
                        @error('age_range')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Data pierwszego kontaktu -->
                    <div>
                        <label for="first_contact_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data pierwszego kontaktu</label>
                        <input type="date" name="first_contact_date" id="first_contact_date" value="{{ old('first_contact_date') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('first_contact_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Data ostatniego kontaktu -->
                    <div>
                        <label for="last_contact_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data ostatniego kontaktu</label>
                        <input type="date" name="last_contact_date" id="last_contact_date" value="{{ old('last_contact_date') }}"
                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                        @error('last_contact_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Opis</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="special_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi specjalne</label>
                        <textarea name="special_notes" id="special_notes" rows="4"
                                  class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">{{ old('special_notes') }}</textarea>
                        @error('special_notes')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{
        children: [{ first_name: '', last_name: '', age: null, birth_date: '', notes: '' }],
        addChild() {
            this.children.push({ first_name: '', last_name: '', age: null, birth_date: '', notes: '' });
        },
        removeChild(index) {
            this.children.splice(index, 1);
        }
    }" class="mt-6">
                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 font-bold">Dzieci</h3>

                        <template x-for="(child, index) in children" :key="index">
                            <div class="border rounded p-4 bg-gray-100 dark:bg-gray-800 mt-4">
                                <div class="flex justify-between items-center">
                                    <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dziecko <span x-text="index + 1"></span></h5>
                                    <button type="button" @click="removeChild(index)" class="text-red-500 hover:underline">
                                        Usuń
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_first_name'" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>
                                    <input type="text" :name="'children[' + index + '][first_name]'" :id="'child_' + index + '_first_name'" x-model="child.first_name"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_last_name'" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>
                                    <input type="text" :name="'children[' + index + '][last_name]'" :id="'child_' + index + '_last_name'" x-model="child.last_name"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_age'" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wiek</label>
                                    <input type="number" :name="'children[' + index + '][age]'" :id="'child_' + index + '_age'" x-model="child.age"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_birth_date'" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data urodzenia</label>
                                    <input type="date" :name="'children[' + index + '][birth_date]'" :id="'child_' + index + '_birth_date'" x-model="child.birth_date"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_notes'" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                    <textarea :name="'children[' + index + '][notes]'" :id="'child_' + index + '_notes'" x-model="child.notes"
                                              rows="3"
                                              class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"></textarea>
                                </div>
                            </div>
                        </template>

                        <div class="mt-6">
                            <button type="button" @click="addChild()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Dodaj dziecko
                            </button>
                        </div>
                    </div>


                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Zapisz klienta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
