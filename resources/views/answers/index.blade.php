@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/answers" method="POST" id="answers" onsubmit="onSubmit()">
        <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
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
    window['_fs_debug'] = false;
    window['_fs_host'] = 'fullstory.com';
    window['_fs_script'] = 'fullstory.com/s/fs.js';
    window['_fs_org'] = '3B7NE';
    window['_fs_namespace'] = 'FS';
    (function(m,n,e,t,l,o,g,y){
        if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
        g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
        o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_script;
        y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
        g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
        g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
        g.log = function(a,b) { g("log", [a,b]) };
        g.consent=function(a){g("consent",!arguments.length||a)};
        g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
        g.clearUserCookie=function(){};
    })(window,document,window['_fs_namespace'],'script','user');
</script>
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
            editor.session.setMode("ace/mode/{{ $candidate->assessment->language }}");
            editor.setOption("maxLines", 100);
            editors.push(editor);
        });

        FS.identify('{{$candidate->id}}', {
          displayName: '{{$candidate->email}}',
          email: '{{$candidate->email}}',
        });
    }
</script>
