@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{ route('admin.posts.store') }}">
                @csrf
                <!--Post Title-->
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="titlePost" placeholder="Title" name="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--Post Description-->
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <!--Post IMG URL-->
                <div class="form-group">
                    <label for="image">IMG URL</label>
                    <input type="text" class="form-control" id="image" placeholder="URL IMAGE" name="image">
                    
                </div>
                <!--Post Category-->
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option>Choose a Category...</option>
                        @foreach ($categories as $category)
                            <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>                     
                        @endforeach
                    </select>
                    @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                     @enderror 
                </div>
                <!--Tag Post-->
                <fieldset class="mb-4">
                    <h5>Tags</h5>
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
                            <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </fieldset>
                <!--Submit-->
                <button type="submit" class="btn btn-success">Create</a>
                <button type="reset" class="btn btn-secondary ml-2">Reset</button>
                </form>
        </div>
    </div>
</div>
    
@endsection