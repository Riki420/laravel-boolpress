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
            <div>
                @if($post->category) <span class="badge p-2 rounded-pill bg-{{$post->category->color}}">{{$post->category->name}}</span> @else - @endif
            </div>
        </div>
        <!--Post Body-->
        <div class="card-body d-flex">
            <p class="monserrat-text">{{$post->content}}</p>
            <figure>
                <img src="{{$post->image}}" alt="img-post" class="img-fluid">
            </figure>
        </div>
        <!--Post Footer-->
        <div class="card-footer d-flex justify-content-between">
            <address><!--Se c'è l'autore del post mostro il nome, se no scrivo No Author-->
                  @if($post->author) <a href="{{ route('admin.author.index') }}">{{$post->author->name}}</a> @else No Author @endif</address>
            <small>{{$post->created_at}}</small>
        </div>
    </div>
    <!--Button-->
    <div class="d-flex justify-content-end mt-2">
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit Post </a>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ml-2">Back</a>
    </div>
</div>
@endsection