<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="grid gap-4 grid-cols-2 grid-rows-1">    
            <!-- First Name -->
            <div class="block">
                <x-text-input id="first_name" class="mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" placeholder="*First Name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="block">
                <x-text-input id="last_name" class="mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="*Last Name"/>
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>
        </div>

        <!-- NIP -->
        <div class="mt-4">
            <x-text-input id="NIP" class="block mt-1 w-full" type="number" name="NIP" :value="old('NIP')" required autocomplete="NIP" placeholder="*NIP"/>
            <x-input-error :messages="$errors->get('NIP')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="*New Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div> --}}

        <!-- Hidden Role -->
        <input id="role" name="role" type="hidden" value="employee">
        <input id="user_id" name="user_id" type="hidden">

        <!-- Login -->
        <div class="block mt-2 text-sm text-[#3E5457]">
            <span>Already have an account? </span><a class="cursor-pointer hover:text-blue-500 focus:text-blue-500 underline" href="{{ route('login') }}" >{{ __('Login here!') }}</a>
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a> --}}

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
