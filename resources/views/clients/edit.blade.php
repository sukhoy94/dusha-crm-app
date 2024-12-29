@section('title', 'Edytuj dane klienta')
<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2
                class="mb-4 text-xl font-bold text-gray-900 dark:text-white"
            >Edytuj klienta
            </h2>

            <form action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label
                            for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Imię
                        </label>
                        <input
                            type="text"
                            name="first_name"
                            id="name"
                            class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900
                                text-sm rounded-lg
                                focus:ring-primary-600
                                focus:border-primary-600
                                block w-full
                                p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500
                            "
                            placeholder="Wpisz imię klienta"
                            required
                            value="{{ $client->first_name }}"
                        >
                    </div>

                    <div>
                        <label
                            for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Nazwisko
                        </label>
                        <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900
                                text-sm rounded-lg
                                focus:ring-primary-600
                                focus:border-primary-600
                                block w-full
                                p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500
                            "
                            placeholder="Wpisz nazwisko klienta"
                            required
                            value="{{ $client->last_name }}"
                        >
                    </div>

                    <div>
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="emai"
                            class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900
                                text-sm rounded-lg
                                focus:ring-primary-600
                                focus:border-primary-600
                                block w-full
                                p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500
                            "
                            placeholder="Email klienta"
                            value="{{ $client->email }}"
                        >
                    </div>
                    <div>
                        <label
                            for="phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Telefon
                        </label>
                        <input
                            type="text"
                            name="phone"
                            id="phone"
                            class="
                                bg-gray-50
                                border border-gray-300
                                text-gray-900
                                text-sm rounded-lg
                                focus:ring-primary-600
                                focus:border-primary-600
                                block w-full
                                p-2.5
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500
                            "
                            placeholder="Telefon klienta"
                            value="{{ $client->phone }}"
                        >
                    </div>

                    <div class="grid grid-cols-subgrid grid-cols-1 col-span-2">
                        <div>
                            <label
                                for="additional_contact"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Dodatkowy kontakt</label>
                            <textarea
                                id="additional_contact"
                                rows="4"
                                name="additional_contact"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Dodatkowy kontakt do klienta">{{ $client->additional_contact }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label
                            for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Wybierz płeć
                        </label>
                        <select
                            id="gender"
                            name="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option value="">Wybierz płeć</option>
                            <option value="male" {{ old('gender', $client->gender) == 'male' ? 'selected' : '' }}>
                                Mężczyzna
                            </option>
                            <option value="female" {{ old('gender', $client->gender) == 'female' ? 'selected' : '' }}>
                                Kobieta
                            </option>
                            <option value="other" {{ old('gender', $client->gender) == 'other' ? 'selected' : '' }}>
                                Inna
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            for="age_range"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Zakres wiekowy
                        </label>
                        <select
                            name="age_range"
                            id="age_range"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                            <option value="">Wybierz zakres</option>
                            <option
                                value="18-24" {{ old('age_range', $client->age_range) == '18-24' ? 'selected' : '' }}>
                                18-24
                            </option>
                            <option
                                value="25-30" {{ old('age_range', $client->age_range) == '25-30' ? 'selected' : '' }}>
                                25-30
                            </option>
                            <option
                                value="31-39" {{ old('age_range', $client->age_range) == '31-39' ? 'selected' : '' }}>
                                31-39
                            </option>
                            <option
                                value="40-50" {{ old('age_range', $client->age_range) == '40-50' ? 'selected' : '' }}>
                                40-50
                            </option>
                            <option value="50+" {{ old('age_range', $client->age_range) == '50+' ? 'selected' : '' }}>
                                50+
                            </option>
                        </select>
                    </div>

                    <div>
                        <label
                            for="first_contact_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Data pierwszego kontaktu
                        </label>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input
                            datepicker
                            name="first_contact_date"
                            id="first_contact_date"
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Data pierwszego kontaktu"
                            datepicker-format="yyyy-mm-dd"
                            value="{{ $client->first_contact_date }}"
                        >
                    </div>

                    <div>
                        <label
                            for="last_contact_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Data ostatniego kontaktu
                        </label>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input
                            datepicker
                            id="last_contact_date"
                            name="last_contact_date"
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Data ostatniego kontaktu"
                            datepicker-format="yyyy-mm-dd"
                            value="{{ $client->last_contact_date }}"
                        >
                    </div>

                    <div class="grid grid-cols-subgrid grid-cols-1 col-span-2">
                        <div>
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Opis</label>
                            <textarea
                                id="description"
                                rows="4"
                                name="description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Dodaj opis klienta">{{ $client->description }}</textarea>
                        </div>
                    </div>

                    <div class="grid grid-cols-subgrid grid-cols-1 col-span-2">
                        <div>
                            <label
                                for="special_notes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Uwagi specjalne</label>
                            <textarea
                                name="special_notes"
                                id="special_notes"
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Dodaj szczególne dodatkowe uwagi">{{ $client->special_notes }}</textarea>
                        </div>
                    </div>

                    <div x-data="{
                        children: {{ json_encode($children) }},
                        addChild() {
                            this.children.push({ id: null, first_name: '', last_name: '', age: null, birth_date: '', notes: '', _delete: 0 });
                        },
                        removeChild(index) {
                            if (this.children[index].id !== null) {
                                this.children[index]._delete = 1;
                            } else {
                                this.children.splice(index, 1);
                            }
                        }
                    }" class="col-span-2">
                        <template x-for="(child, index) in children" :key="index">
                            <section x-show="!child._delete" class="border rounded p-4 mt-4 mb-4 bg-white dark:bg-gray-900">
                                <div class="flex justify-between items-center">
                                    <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dziecko <span
                                            x-text="index + 1"></span></h5>
                                    <button type="button" @click="removeChild(index)"
                                            class="text-red-500 hover:underline">
                                        Usuń
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_first_name'"
                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>
                                    <input type="text" :name="'children[' + index + '][first_name]'"
                                           :id="'child_' + index + '_first_name'" x-model="child.first_name"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_last_name'"
                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>
                                    <input type="text" :name="'children[' + index + '][last_name]'"
                                           :id="'child_' + index + '_last_name'" x-model="child.last_name"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_age'"
                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wiek</label>
                                    <input type="number" :name="'children[' + index + '][age]'"
                                           :id="'child_' + index + '_age'" x-model="child.age"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_birth_date'"
                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data
                                        urodzenia</label>
                                    <input type="date" :name="'children[' + index + '][birth_date]'"
                                           :id="'child_' + index + '_birth_date'" x-model="child.birth_date"
                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">
                                </div>
                                <div class="mt-4">
                                    <label :for="'child_' + index + '_notes'"
                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>
                                    <textarea :name="'children[' + index + '][notes]'" :id="'child_' + index + '_notes'"
                                              x-model="child.notes"
                                              rows="3"
                                              class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"></textarea>
                                </div>
                                <input type="hidden" :name="'children[' + index + '][id]'" x-model="child.id">
                                <input type="hidden" :name="'children[' + index + '][_delete]'" x-model="child._delete">
                            </section>
                        </template>

                        <div>
                            <button
                                type="button"
                                @click="addChild()"
                                class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            >
                                Dodaj dziecko
                            </button>

                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            >
                                Zapisz dane klienta
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            @if (session('success'))--}}
{{--                <div--}}
{{--                    class="flex items-center bg-green-500 text-white text-sm font-medium p-4 rounded-lg shadow-lg mb-4 animate-fade-in">--}}
{{--                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"--}}
{{--                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>--}}
{{--                    </svg>--}}
{{--                    <span>{{ session('success') }}</span>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">--}}
{{--                <form action="{{ route('clients.update', $client) }}" method="POST" class="space-y-6">--}}
{{--                    @csrf--}}
{{--                    @method('PUT')--}}

{{--                    <div>--}}
{{--                        <label for="first_name"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>--}}
{{--                        <input type="text" name="first_name" id="first_name"--}}
{{--                               value="{{ old('first_name', $client->first_name) }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('first_name')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>--}}
{{--                        <input type="text" name="last_name" id="last_name"--}}
{{--                               value="{{ old('last_name', $client->last_name) }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('last_name')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="email"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>--}}
{{--                        <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('email')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="phone"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefon</label>--}}
{{--                        <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('phone')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="additional_contact"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dodatkowy--}}
{{--                            kontakt</label>--}}
{{--                        <textarea--}}
{{--                            name="additional_contact"--}}
{{--                            id="additional_contact"--}}
{{--                            rows="4"--}}
{{--                            class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"--}}
{{--                        >{{ old('additional_contact', $client->additional_contact) }}</textarea>--}}

{{--                        @error('additional_contact')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="gender"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Płeć</label>--}}
{{--                        <select name="gender" id="gender"--}}
{{--                                class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                            <option value="">Wybierz płeć</option>--}}
{{--                            <option value="male" {{ old('gender', $client->gender) == 'male' ? 'selected' : '' }}>--}}
{{--                                Mężczyzna--}}
{{--                            </option>--}}
{{--                            <option value="female" {{ old('gender', $client->gender) == 'female' ? 'selected' : '' }}>--}}
{{--                                Kobieta--}}
{{--                            </option>--}}
{{--                            <option value="other" {{ old('gender', $client->gender) == 'other' ? 'selected' : '' }}>--}}
{{--                                Inna--}}
{{--                            </option>--}}
{{--                        </select>--}}
{{--                        @error('gender')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="age_range" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Zakres--}}
{{--                            wiekowy</label>--}}
{{--                        <select name="age_range" id="age_range"--}}
{{--                                class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                            <option value="">Wybierz zakres</option>--}}
{{--                            <option--}}
{{--                                value="18-24" {{ old('age_range', $client->age_range) == '18-24' ? 'selected' : '' }}>--}}
{{--                                18-24--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="25-30" {{ old('age_range', $client->age_range) == '25-30' ? 'selected' : '' }}>--}}
{{--                                25-30--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="31-39" {{ old('age_range', $client->age_range) == '31-39' ? 'selected' : '' }}>--}}
{{--                                31-39--}}
{{--                            </option>--}}
{{--                            <option--}}
{{--                                value="40-50" {{ old('age_range', $client->age_range) == '40-50' ? 'selected' : '' }}>--}}
{{--                                40-50--}}
{{--                            </option>--}}
{{--                            <option value="50+" {{ old('age_range', $client->age_range) == '50+' ? 'selected' : '' }}>--}}
{{--                                50+--}}
{{--                            </option>--}}
{{--                        </select>--}}
{{--                        @error('age_range')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}

{{--                        <label for="first_contact_date"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data pierwszego--}}
{{--                            kontaktu</label>--}}
{{--                        <input type="date" name="first_contact_date" id="first_contact_date"--}}
{{--                               value="{{ $client->first_contact_date }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('first_contact_date')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="last_contact_date"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data ostatniego--}}
{{--                            kontaktu</label>--}}
{{--                        <input type="date" name="last_contact_date" id="last_contact_date"--}}
{{--                               value="{{ $client->last_contact_date }}"--}}
{{--                               class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                        @error('last_contact_date')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="description"--}}
{{--                               class="block text-sm font-medium text-gray-700 dark:text-gray-300">Opis</label>--}}
{{--                        <textarea name="description" id="description" rows="4"--}}
{{--                                  class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">{{ old('description', $client->description) }}</textarea>--}}
{{--                        @error('description')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div>--}}
{{--                        <label for="special_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi--}}
{{--                            specjalne</label>--}}
{{--                        <textarea name="special_notes" id="special_notes" rows="4"--}}
{{--                                  class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">{{ old('special_notes', $client->special_notes) }}</textarea>--}}
{{--                        @error('special_notes')--}}
{{--                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div x-data="{--}}
{{--                        children: {{ json_encode($children) }},--}}
{{--                        addChild() {--}}
{{--                            this.children.push({ id: null, first_name: '', last_name: '', age: null, birth_date: '', notes: '', _delete: 0 });--}}
{{--                        },--}}
{{--                        removeChild(index) {--}}
{{--                            if (this.children[index].id !== null) {--}}
{{--                                this.children[index]._delete = 1;--}}
{{--                            } else {--}}
{{--                                this.children.splice(index, 1);--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }" class="mt-6">--}}


{{--                        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-300 font-bold">--}}
{{--                            @if (!empty($children->items))--}}
{{--                                Przypisane dzieci do klienta--}}
{{--                            @endif--}}
{{--                        </h3>--}}

{{--                        <template x-for="(child, index) in children" :key="index">--}}
{{--                            <div x-show="!child._delete" class="border rounded p-4 bg-gray-100 dark:bg-gray-800 mt-4">--}}
{{--                                <div class="flex justify-between items-center">--}}
{{--                                    <h5 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dziecko <span--}}
{{--                                            x-text="index + 1"></span></h5>--}}
{{--                                    <button type="button" @click="removeChild(index)"--}}
{{--                                            class="text-red-500 hover:underline">--}}
{{--                                        Usuń--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                                <div class="mt-4">--}}
{{--                                    <label :for="'child_' + index + '_first_name'"--}}
{{--                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imię</label>--}}
{{--                                    <input type="text" :name="'children[' + index + '][first_name]'"--}}
{{--                                           :id="'child_' + index + '_first_name'" x-model="child.first_name"--}}
{{--                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                                </div>--}}
{{--                                <div class="mt-4">--}}
{{--                                    <label :for="'child_' + index + '_last_name'"--}}
{{--                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nazwisko</label>--}}
{{--                                    <input type="text" :name="'children[' + index + '][last_name]'"--}}
{{--                                           :id="'child_' + index + '_last_name'" x-model="child.last_name"--}}
{{--                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                                </div>--}}
{{--                                <div class="mt-4">--}}
{{--                                    <label :for="'child_' + index + '_age'"--}}
{{--                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Wiek</label>--}}
{{--                                    <input type="number" :name="'children[' + index + '][age]'"--}}
{{--                                           :id="'child_' + index + '_age'" x-model="child.age"--}}
{{--                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                                </div>--}}
{{--                                <div class="mt-4">--}}
{{--                                    <label :for="'child_' + index + '_birth_date'"--}}
{{--                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data--}}
{{--                                        urodzenia</label>--}}
{{--                                    <input type="date" :name="'children[' + index + '][birth_date]'"--}}
{{--                                           :id="'child_' + index + '_birth_date'" x-model="child.birth_date"--}}
{{--                                           class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0">--}}
{{--                                </div>--}}
{{--                                <div class="mt-4">--}}
{{--                                    <label :for="'child_' + index + '_notes'"--}}
{{--                                           class="block text-sm font-medium text-gray-700 dark:text-gray-300">Uwagi</label>--}}
{{--                                    <textarea :name="'children[' + index + '][notes]'" :id="'child_' + index + '_notes'"--}}
{{--                                              x-model="child.notes"--}}
{{--                                              rows="3"--}}
{{--                                              class="mt-1 block w-full rounded-md bg-gray-200 dark:bg-gray-700 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0"></textarea>--}}
{{--                                </div>--}}
{{--                                <input type="hidden" :name="'children[' + index + '][id]'" x-model="child.id">--}}
{{--                                <input type="hidden" :name="'children[' + index + '][_delete]'" x-model="child._delete">--}}
{{--                            </div>--}}
{{--                        </template>--}}

{{--                        <div class="mt-6">--}}
{{--                            <button type="button" @click="addChild()"--}}
{{--                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                                Dodaj dziecko--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <button type="submit"--}}
{{--                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                            Zapisz zmiany--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
