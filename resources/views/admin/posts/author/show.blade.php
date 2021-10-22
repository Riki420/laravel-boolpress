@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
               <h1> {{ $user->name }} </h1>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <ul >
                            <li>Address: @if($user->usrInfo){{ $user->usrInfo->address }} @else None @endif</li>
                            <li>Mail: {{ $user->email }}</li>
                        </ul>
                    </div>
                    <div >
                        @if($user->usrInfo)
                            <img src="{{$user->usrInfo->image}}" alt="pic-user" class="img-fluid w-50">
                        @else No-pic 
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('admin.author.index') }}" class="btn btn-primary ml-2">Back</a>

            </div>
        </div>
    </div>
@endsection