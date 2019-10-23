@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right; padding-left:1em;" href="/candidates/{{$candidate->id}}/edit" class="card-link">Edit</a>
                    <a style="float:right" href="#" onclick="if (confirm('Delete candidate?')) document.getElementById('delete').submit()" class="card-link">Delete</a>
                    Candidate
                </div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{$candidate->name}}</p>
                    <p><strong>Email:</strong> {{$candidate->email}}</p>
                    <p><strong>Assessment:</strong> {{$candidate->assessment->name}}</p>
                    <p><strong>Link:</strong> <a href="{{ Request::root() }}/answers?token={{$candidate->token}}">{{ Request::root() }}/answers?token={{$candidate->token}}</a></p>
                    <strong>Created At:</strong> {{$candidate->created_at}}
                    <strong>Submitted At:</strong> {{$candidate->submitted_at}}
                </div>
            </div>
        </div>
    </div>
    <br/>

    @if(!$candidate->answers->count())
        Candidate has not yet answered the assessment questions
    @endif

    @foreach($candidate->answers as $answer)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $answer->question->description }}
                </div>

                <div class="card-body">
                    <pre><code>{{$answer->description}}</code></pre>
                </div>
            </div>
        </div>
    </div>
    <br/>
    @endforeach

    <form action="/candidates/{{$candidate->id}}" method="POST" id="delete">
        @csrf
        @method('DELETE')
    </form>
</div>
@endsection
