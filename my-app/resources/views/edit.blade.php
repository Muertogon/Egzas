@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <h2>Add Post</h2>
        <form method="POST" action="/submit">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <select class="form-control" id="category" name="category">
                    <option value="sports">Sports</option>
                    <option value="entertainment">Entertainment</option>
                    <option value="work">Work</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Name" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Description</label>
                <input type="text" class="form-control" id="description" name="description">
            </div>
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </div>
            <div class="mb-3">
                <input type="submit" value="Add Post" class="btn btn-dark">
            </div>
        </form>
    </div>
</div>
@endsection