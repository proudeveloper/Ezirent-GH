<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Instructions for users -->
    <div class="mb-4 text-gray-600">
        <p>Enter your phone number below, and we will send you a One-Time Password (OTP) via SMS to verify your login.</p>
    </div>

    <form method="POST" action="{{ route('send-otp') }}">
        @csrf

        <!-- Phone Number -->
        <div>
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="tel" placeholder="Enter your phone number" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('register') }}" class="text-sm text-black-600 hover:underline">
                Not registered? Sign up here
            </a>
            <x-primary-button class="ms-3">
                {{ __('Send OTP via SMS') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
