<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login-user') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Wpisz email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                value="{{@old('email')}}"
                required autofocus autocomplete="username"
            >
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required autocomplete="current-password"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form>
</x-guest-layout>
