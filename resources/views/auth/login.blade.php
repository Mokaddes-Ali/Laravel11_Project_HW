<x-guest-layout>
    {{-- <!-- Form Background Image -->
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





        <!-- Dynamic Contact Image from Google -->
        <div class="mt-6 text-center">
            <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg" alt="Contact Image" class="rounded-full w-24 h-24 mx-auto">
        </div>
    </form> --}}

    <div class="font-[sans-serif]">
        <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
          <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
            <div class="border border-gray-300 rounded-lg p-6 shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
               <form method="POST" action="{{ route('login') }}" class=" bg-opacity-75">
                 @csrf
                <div class="mb-8">
                  <h3 class="text-gray-800 text-3xl font-extrabold">Sign in</h3>
                  <p class="text-gray-500 text-sm mt-4 leading-relaxed">Sign in to your account and explore a world of possibilities. Your journey begins here.</p>
                </div>

                <div>
                <x-input-label for="email" :value="__('Email')" />
                  <div class="relative flex items-center">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                      <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                      <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                    </svg>
                  </div>
                </div>

                    <!-- Password -->
                 <div class="mt-4">
                   <x-input-label for="password" :value="__('Password')" />
                   <div class="relative flex items-center">
                     <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                      <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                  </div>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-4">
                  <div class="flex items-center">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                  </div>

                  <div class="text-sm">
                    @if (Route::has('password.request'))
                 <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                 @endif
                  </div>
                </div>
                <div class="!mt-8">
                    <x-primary-button class="w-full pl-52 shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                      Log in
                    </x-primary-button>
                  </div>
                <p class="text-sm !mt-8 text-center text-gray-800">Don't have an account <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register here</a></p>
              </form>
            </div>
            <div class="lg:h-[400px] ml-24 md:h-[300px] max-md:mt-8">
                <img src="https://readymadeui.com/login-image.webp" class="w-[600px] h-80 max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
         </div>
        </div>
      </div>
</x-guest-layout>
