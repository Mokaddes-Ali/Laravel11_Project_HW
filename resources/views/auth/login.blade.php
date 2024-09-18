<x-guest-layout>
    <!-- Form Background Image -->
    <form method="POST" action="{{ route('login') }}" class=" bg-opacity-75 p-8 rounded-md shadow-lg"
        style="background-image: url('https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="bg-red-500" :value="__('Password')" />
            <x-text-input id="password" class="block bg-none border-lime-600 mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Create Account Option -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="underline text-sm text-indigo-600 hover:text-indigo-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Create an account') }}
                </a>
            </p>
        </div>



        <!-- Dynamic Contact Image from Google -->
        <div class="mt-6 text-center">
            <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg" alt="Contact Image" class="rounded-full w-24 h-24 mx-auto">
        </div>
    </form>

</x-guest-layout>
