@extends('layouts.app')


@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Post Title</th>
            <th scope="col">Created At</th>
          </tr>
        </thead>
        <tbody>
          @forelse($posts as $post)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->created_at}}</td>
                <td class="d-flex justify-content-end">
                  <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Visualizza</a>

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