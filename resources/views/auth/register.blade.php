<x-guest-layout>
    <x-auth-card>



        <form class="form-register" method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="{{URL::asset('/images/elephant.png')}}" alt="" width="72" height="72">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="alert alert-primary" :errors="$errors" />
            <!-- Name -->
            <div class="mb-3">
                <x-label class="form-label"  for="name" :value="__('Name')" />

                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-label class="form-label" for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label class="form-label"  for="password" :value="__('Password')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label class="form-label"  for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="btn btn-primary">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
