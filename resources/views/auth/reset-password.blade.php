<x-guest-layout>
    <x-auth-card>




        <form method="POST" class="form-signin" action="{{ route('password.update') }}">
            @csrf
            <img class="mb-4" src="{{URL::asset('/images/elephant.png')}}" alt="" width="72" height="72">
            <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label class="form-label" for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="form-label" for="password" :value="__('Password')" />

                <x-input class="form-control" id="password"  type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label class="form-label" for="password_confirmation" :value="__('Confirm Password')" />

                <x-input class="form-control" id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="btn btn-dark">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
