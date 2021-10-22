@extends('layouts.app')


@section('content')
<div class="container">
    @if(session('alert'))
    <div class="alert alert-{{session('alert')}}">
        {{session('alert-message')}}
    </div>
    @endif
    <h1>My Post</h1>
    <table class="table">
      <!--Table Header-->
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Post Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th class="d-flex justify-content-end">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Add New Post</a>
                </th>
            </tr>
        </thead>
        <!--Table Body-->
        <tbody>
          @forelse($posts as $post)
              <tr>
                <th>{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                  <!--Se c'è l'autore del post mostro il nome, se no scrivo No Author-->
                  @if($post->author) {{$post->author->name}} @else No Author @endif
                </td>
                <td>
                  <!--Se c'è la categoria di un post mostro il nome, altrimenti scrivo altro-->
                  @if($post->category)
                  {{ $post->category->name }}
                  @else -
                  @endif
                </td>
                <!--Button-->
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
      <!--Paginate-->
      <div class="d-flex align-item-center justify-content-end">
        {{$posts->links()}}
      </div>
</div>
@endsection