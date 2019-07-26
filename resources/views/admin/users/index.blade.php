@extends('layouts.admin')

@section('content')

    @if (Session::has('deleted_user'))
        <p class="bg-danger">{{ session('deleted_user') }}</p>
    @endif

    <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            <tbody>
                @if($users)
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="{{ $user->photo ?$user->photo->file: '/images/placeholder.png' }}" alt="" height="50" width="60"></td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->is_active ? 'Active': 'Inactive' }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </thead>
    </table>
@endsection