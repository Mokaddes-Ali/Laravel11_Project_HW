<x-guest-layout>
    <div class="relative min-h-screen bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-photo/register-now-document-filling-form-concept_53876-121194.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Form container with logo and text -->
        <div class="relative z-20 flex flex-col items-center justify-center min-h-screen">
            <!-- Logo and Text -->
            <div class="text-center mb-8">
                <h1 class="text-white text-2xl font-bold mt-4">Welcome to the Registration</h1>
            </div>

            <!-- Form container with shadow -->
            <form method="POST" action="{{ route('register') }}" class="relative -mt-10 z-20 w-full max-w-md rounded-lg  p-6">
                @csrf
                <!-- Name -->
                <div class="mb-2">
                    <x-input-label class="text-yellow-300 text-lg font-bold" for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="name" :value="old('name')" required autofocus placeholder="Enter Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-2">
                    <x-input-label for="email" class="text-yellow-300 text-lg font-bold" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')" required placeholder="Enter Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Phone Number -->
                <div class="mb-2">
                    <x-input-label for="phone_number" class="text-yellow-300 text-lg font-bold" :value="__('Phone Number')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="phone_number" :value="old('phone_number')" required placeholder="Enter Phone Number" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Student ID Number -->
                <div class="mb-2">
                    <x-input-label for="student_id_number" class="text-yellow-300 text-lg font-bold" :value="__('Student ID Number')" />
                    <x-text-input id="student_id_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="text" name="student_id_number" :value="old('student_id_number')" required placeholder="Enter Student ID Number" />
                    <x-input-error :messages="$errors->get('student_id_number')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <x-input-label for="password" class="text-yellow-300 text-lg font-bold" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" placeholder="Enter Password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-2">
                    <x-input-label for="password_confirmation" class="text-yellow-300 text-lg font-bold" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit Button and Link -->
                <div class="flex items-center justify-between mt-2">
                    <a class="underline text-white text-lg font-semibold hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
