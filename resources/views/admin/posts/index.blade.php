@extends('layouts.app')


@section('content')
<div class="container">
    @if(session('alert'))
    <div class="alert alert-{{session('alert')}}">
        {{session('alert-message')}}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Created At</th>
                <th class="d-flex justify-content-end">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add New Post</a>
                </th>
            </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at}}</td>
                <td class="d-flex justify-content-end">
                  <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">View Post </a>
                  <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Edit Post </a>
                  <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger ml-2">Delete Post </button>
                  </form>

                </td>
              </tr>
          @empty
          <tr>
            <td colspan="3">Nessun Post</td>
          </tr>
        </tbody>
        @endforelse
      </table>
</div>
@endsection