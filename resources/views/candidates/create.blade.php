@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Candidate
                </div>

                <div class="card-body">

                    <form action="/candidates" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Email</label>
                            <input required type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label>Assessment</label>
                            <select required class="form-control" id="assessment_id" name="assessment_id">
                                @foreach($assessments as $assessment)
                                    <option value="{{$assessment->id}}">{{$assessment->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="/candidates" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
