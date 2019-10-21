@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Create Assessment
                </div>

                <div class="card-body">

                    <form action="/assessments" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label>Name</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label>Language</label>
                            <select required class="form-control" name="language">
                                <option value="typescript">Typescript</option>
                                <option value="ruby">Ruby</option>
                                <option value="php">PHP</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="/assessments" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
