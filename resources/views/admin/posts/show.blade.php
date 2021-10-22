@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('alert'))
    <div class="alert alert-{{session('alert')}}">
        {{session('alert-message')}}
    </div>
    @endif
    <div class="card">
        <!--Post Header-->
        <div class="card-header">
            <h2 class="roboto-text">{{$post->title}}</h2>
            <h6>Category: @if($post->category){{ $post->category->name }} @else None @endif</h6>
        </div>
        <!--Post Body-->
        <div class="card-body d-flex">
            <p class="monserrat-text">{{$post->content}}</p>
            <figure>
                <img src="{{$post->image}}" alt="img-post" class="img-fluid">
            </figure>
        </div>
        <!--Post Footer-->
        <div class="card-footer d-flex justify-content-end">
            <address>{{$post->created_at}}</address>
        </div>
    </div>
    <!--Button-->
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit Post </a>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ml-2">Back</a>
    </div>
</div>
@endsection