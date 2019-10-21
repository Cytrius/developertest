@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/answers" method="POST" id="answers" onsubmit="onSubmit()">
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
        @csrf
        @method('POST')
        @foreach($candidate->assessment->questions as $question)
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if($candidate->answers->firstWhere('question_id', $question->id))
                                <div style="float:right"><strong>Last Submitted:</strong> {{ $candidate->answers->firstWhere('question_id', $question->id)->updated_at }}</div>
                            @endif
                            {{$question->description}}
                        </div>

                        <div class="card-body">
                            @if($candidate->answers->firstWhere('question_id', $question->id))
                                <textarea id="{{$question->id}}" name="{{$question->id}}" class="editor">{{ $candidate->answers->firstWhere('question_id', $question->id)->description }}
                                </textarea>
                            @else
                                <textarea id="{{$question->id}}" name="{{$question->id}}" class="editor"></textarea>
                            @endif
                        </div>
                        <input type="hidden" name="description[{{$question->id}}]">
                    </div>
                </div>
            </div>
            <br/>
        @endforeach

        <div style="text-align:center;">
            <button type="submit" class="btn btn-primary">Submit Assessment</button>
        </div>
    </form>

</div>
@endsection
<style type="text/css" media="screen">
    #editor { 
        display:block;
        width:100%;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.6/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editors = [];

    var onSubmit = function() {
        editors.forEach(function(editor) {
            console.log(editor.id);
            document.querySelector('[name="description['+editor.id+']"]').value = editor.getSession().getValue();
        });
    };

    window.onload = function() {
        document.querySelectorAll('.editor').forEach(function(textarea) {
            var editor = ace.edit(textarea);
            editor.id = textarea.name;
            editor.session.setMode("ace/mode/typescript");
            editor.setOption("maxLines", 100);
            editors.push(editor);
        });
    }
</script>
