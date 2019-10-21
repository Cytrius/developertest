@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right" href="/assessments/create" class="card-link">New Assessment</a>
                    Assessments
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Questions</th>
                        </thead>
                        <tbody>
                            @foreach ($assessments as $assessment)
                            <tr>
                                <td><a href="/assessments/{{$assessment->id}}">{{$assessment->name}}</a></td>
                                <td>{{$assessment->question_count}}</td>
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
