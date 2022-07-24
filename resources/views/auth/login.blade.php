<x-guest-layout>
    <x-auth-card>

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="{{URL::asset('/images/elephant.png')}}" alt="" width="72" height="72">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email" :value="old('email')">
            <input id="password" type="password" class="form-control" placeholder="Password" required="" name="password" required autocomplete="current-password" />
            <div class="checkbox mb-3">
                <label>
                    <input id="remember_me" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="underline text-center" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Log in') }}</button>
            <p class="mt-5 mb-3 text-muted">© 2022</p>
        </form>

    </x-auth-card>
</x-guest-layout>
