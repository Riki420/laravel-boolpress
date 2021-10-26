@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
                @method('PATCH')
                @csrf
                <!--POST TITLE-->
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="titlePost" placeholder="Title" name="title" value="{{$post->title}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--POST DESCRIPTION-->
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{$post->content}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--POST URL IMG-->
                <div class="form-group">
                    <label for="image">IMG URL</label>
                    <input type="text" class="form-control" id="image" placeholder="URL IMAGE" name="image" value="{{$post->image}}">
                </div>
                <!--POST CATEGORY-->
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option>None</option>
                        @foreach ($categories as $category)
                            <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!--Tag Post-->
                <fieldset class="mb-4">
                    <h5>Tags</h5>
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]" @if (in_array($tag->id, old('tags', $tagIds ?? []))) checked @endif >
                            <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </fieldset>
                <button type="submit" class="btn btn-warning">Edit</a>
                </form>
        </div>
    </div>
</div>
    
@endsection