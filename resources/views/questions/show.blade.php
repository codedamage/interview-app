@extends('questions.layout')
@section('title', 'Show question')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="p-2">Show Question</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Question:</strong>
                {{ $question->question }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Answer:</strong>
                {!! $question->answer !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Technology:</strong>
                {{ $tech->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Technology:</strong>
                {{ $question->level }}
            </div>
        </div>
    </div>
    </div>
@endsection
