@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('admin.posts.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="titlePost" placeholder="Title" name="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">IMG URL</label>
                    <input type="text" class="form-control" id="image" placeholder="URL IMAGE" name="image">
                    
                </div>
                <button type="submit" class="btn btn-success">Create</a>
                </form>
        </div>
    </div>
</div>
    
@endsection