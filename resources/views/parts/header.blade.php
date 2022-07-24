<header class="@if (Request::is('/')) {{'mb-auto'}} @else {{'p-3 bg-dark text-white'}} @endif">

    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img style="height: 40px;margin-right:40px" src="{{URL::asset('/images/elephant.png')}}">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
{{--                <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>--}}
{{--                <li><a href="{{ route('questions.index') }}" class="nav-link px-2 text-white">Questions</a></li>--}}
            </ul>
            @auth
            <form class="text-end me-3" role="search" action="{{ route('search') }}" method="GET">
                <input name="search" type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>
            @endauth
            <div class="text-end">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ url('/questions') }}" class="btn btn-outline-light me-2">Questions</a>
                                <a :href="route('logout')"
                                                 class="btn btn-danger me-2"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                                <a class="btn btn-warning" href="{{ route('questions.create') }}"> New Question</a>
                            </form>

                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-light me-2">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>
        </div>
    </div>
</header>
