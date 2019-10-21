@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Question
                </div>

                <div class="card-body">

                    <form action="/questions?assessment_id={{$assessment_id}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Description</label>
                            <input required type="text" class="form-control" id="description" name="description">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="/assessments/{{$assessment_id}}" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
