@extends('questions.layout')
@section('title', 'Edit question')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="p-2">Edit Question</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    <div class="container">
    <form action="{{ route('questions.update',$question->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3">
                <label for="question" class="form-label">Question:</label>
                <input type="text" name="question" id="question" class="form-control" value="{{ $question->question }}" placeholder="Question">
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Answer:</label>
                <textarea class="form-control" style="height:150px" name="answer"  placeholder="Answer">{{ $question->answer }}</textarea>
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Level:</label>
                <select class="form-select" name="level" aria-label="Default select example">
                    <option @if($question->level == "Junior") selected @endif value="Junior">Junior</option>
                    <option @if($question->level == "Middle") selected @endif value="Middle">Middle</option>
                    <option @if($question->level == "Senior") selected @endif value="Senior">Senior</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="question" class="form-label">Technology:</label>
                <select class="form-select" name="tech_id" aria-label="Default select example">
                    @foreach ($all_tech as $tech_item)
                    <option @if($tech_item->id == $question->tech_id) selected @endif value="{{ $tech_item->id }}">{{ $tech_item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
@endsection
