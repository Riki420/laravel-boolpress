@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <h1>ONLY REGISTERED</h1>    
        @else
            <h1>ALL USER</h1>
        @endauth
    </div>
@endsection