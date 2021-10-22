@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">User Name</th>
                <th scope="col">E-Mail</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.author.show', $user->id) }}">
                            {{ $user->name }}
                        </a> 
                    </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->usrInfo ? $user->usrInfo->address : 'No Address' }}
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