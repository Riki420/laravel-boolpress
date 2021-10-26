@extends('layouts.app')



@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Color</th>
                <th scope="col">Post</th>
                <th class="d-flex justify-content-end">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-success">Add New Category</a>
                </th>
            </tr>
        </thead>
        <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>  
                        {{ $category->name }}
                    </td>
                        <td>
                            {{ $category->color }}
                        </td>
                        <td>
                            Post
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning ml-2">Edit Category </a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Delete Category</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">Nessun Post</td>
                        </tr>
                    @endforelse
        </tbody>
    </table>
    </div>
@endsection