@extends('questions.layout')
@section('title', 'All questions')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="p-2">Search results for {{ app('request')->input('search') }}</h2>
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="container">
        @if($questions->isNotEmpty())
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Stack</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{!! $question->answer !!}</td>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->level }}</td>
                    <td>
                        <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                            <div class="dropdown-center">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('questions.show',$question->id) }}">Show</a></li>
                                    <li><a class="dropdown-item" href="{{ route('questions.edit',$question->id) }}">Edit</a></li>
                                    @csrf
                                    @method('DELETE')
                                    <li><button type="submit" class="dropdown-item">Delete</button></li>
                                </ul>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
    {!! $questions->links() !!}

@endsection
