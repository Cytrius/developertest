@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Candidate
                </div>

                <div class="card-body">

                    <form action="/candidates/{{$candidate->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" id="name" name="name" value="{{$candidate->name}}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input required type="email" class="form-control" id="email" name="email" value="{{$candidate->email}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/candidates" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
