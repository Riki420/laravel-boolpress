@extends('layouts.app')

@section('content')
<div class="container">
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
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mt-2">Back</a>
    </div>
</div>
@endsection