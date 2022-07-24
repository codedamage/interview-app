<x-guest-layout>
    <x-auth-card>
        <form class="form-signin" method="POST" action="{{ route('password.email') }}">
            @csrf
            <img class="mb-4" src="{{URL::asset('/images/elephant.png')}}" alt="" width="72" height="72">
            <!-- Validation Errors -->
                <x-auth-validation-errors class="alert alert-primary" role="alert" :errors="$errors" />
                <!-- Session Status -->
                <x-auth-session-status class="alert alert-primary" :status="session('status')" />
            <h1 class="h3 mb-3 font-weight-normal">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </h1>
            <!-- Email Address -->
            <div>
                <x-label class="form-label" for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="btn btn-dark">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
