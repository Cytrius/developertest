@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a style="float:right" href="/candidates/create" class="card-link">New Candidate</a>
                    Candidates
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Assessment</th>
                            <th>Submitted At</th>
                            <th>Created At</th>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $candidate)
                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->email}}</a></td>
                                <td><a href="/candidates/{{$candidate->id}}">{{$candidate->assessment->name}}</a></td>
                                <td>{{$candidate->submitted_at}}</td>
                                <td>{{$candidate->created_at}}</td>
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
