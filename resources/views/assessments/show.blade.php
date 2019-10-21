@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right" href="/assessments/{{$assessment->id}}/edit" class="card-link">Edit</a>
                    Assessment
                </div>

                <div class="card-body">
                    <strong>Name:</strong> {{$assessment->name}}
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right" href="/questions/create?assessment_id={{$assessment->id}}" class="card-link">Add Question</a>
                    Questions
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <th>Description</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($assessment->questions as $question)
                            <tr>
                                <td>{{$question->description}}</td>
                                <td>
                                    <a href="/questions/{{$question->id}}/edit">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
