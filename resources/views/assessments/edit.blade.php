@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right" href="#" onclick="if (confirm('Delete assessment?')) document.getElementById('delete').submit()" class="card-link">Delete</a>
                    Edit Assessment
                </div>

                <div class="card-body">

                    <form action="/assessments/{{$assessment->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" id="name" name="name" value="{{$assessment->name}}">
                        </div>

                        <div class="form-group">
                            <label>Language</label>
                            <select required class="form-control" name="language">
                                <option value="typescript" @if($assessment->language === 'typescript') selected @endif>Typescript</option>
                                <option value="ruby" @if($assessment->language === 'ruby') selected @endif>Ruby</option>
                                <option value="php" @if($assessment->language === 'php') selected @endif>PHP</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/assessments/{{$assessment->id}}" class="btn btn-light">Cancel</a>
                    </form>

                    <form action="/assessments/{{$assessment->id}}" method="POST" id="delete">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
