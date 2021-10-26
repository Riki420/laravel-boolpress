@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col">
        <form method="POST" action="{{route('admin.category.update', $category->id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="name">Nome categoria</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
                <label for="color">Colore</label>
                <input type="text" class="form-control" id="color" name="color" value="{{$category->color}}">
            </div>
            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-primary" href="{{route('admin.category.index')}}">Back</a>
        </form>
    </div>
</div>
@endsection