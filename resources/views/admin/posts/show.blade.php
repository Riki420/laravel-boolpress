@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('alert'))
    <div class="alert alert-{{session('alert')}}">
        {{session('alert-message')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h2>{{$post->title}}</h2>
            <h6>Category: @if($post->category){{ $post->category->name }} @else None @endif</h6>
        </div>
        <div class="card-body">
            <p>{{$post->content}}</p>
        </div>
        <div class="card-footer">
            <address>{{$post->created_at}}</address>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit Post </a>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ml-2">Back</a>
    </div>
</div>
@endsection