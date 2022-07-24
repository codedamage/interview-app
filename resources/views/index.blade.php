<html lang="en" class="h-100"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>PHP interview questions</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
    <link rel="icon" href="{{asset('favicon.ico')}}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/r4fqe6vzwcrscrcv7d2l5scqq8l4yz77l9hpb48e2dga56cu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('css/cover.css')}}" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    @include('parts.header')
    @auth
        <main class="px-3">
            <h1>Get lucky!</h1>
            <p class="lead">Ask question and recieve answer via email!</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('send.email')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Question" name="question" aria-label="Question" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" value="submit">Get lucky!</button>
                </div>
                <input type="hidden" name="email" value="{{ Auth::user()->email  }}" id="email">
            </form>
        </main>
    @else
        <main class="px-3">
            <h1>PHP interview questions</h1>
            <p class="lead">List of questions, needed for passing PHP developer technical interviews</p>
            <p class="lead">
                <a href="{{ route('questions.index') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
            </p>
        </main>
    @endauth
    <footer class="mt-auto text-white-50">
        <p>Developed by <a href="https://github.com/codedamage" class="text-white">@codedamage</a>.</p>
    </footer>
</div>





</body></html>
