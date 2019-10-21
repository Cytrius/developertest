@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <a style="float:right" href="#" onclick="if (confirm('Delete question?')) document.getElementById('delete').submit()" class="card-link">Delete</a>
                    Edit Question
                </div>

                <div class="card-body">

                    <form action="/questions/{{$question->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Description</label>
                            <input required type="text" class="form-control" id="description" name="description" value="{{$question->description}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/assessments/{{$question->assessment_id}}" class="btn btn-light">Cancel</a>
                    </form>

                    <form action="/questions/{{$question->id}}" method="POST" id="delete">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
