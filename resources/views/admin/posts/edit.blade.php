@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="titlePost" placeholder="Title" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">IMG URL</label>
                    <input type="text" class="form-control" id="image" placeholder="URL IMAGE" name="image" value="{{$post->image}}">
                </div>
                <button type="submit" class="btn btn-warning">Edit</a>
                </form>
        </div>
    </div>
</div>
    
@endsection