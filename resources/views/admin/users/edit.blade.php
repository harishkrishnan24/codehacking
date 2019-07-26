@extends('layouts.admin')
@section('content')
    <h1>Edit Users</h1>
    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive img-rounded" src="{{ $user->photo ? $user->photo->file: '/images/placeholder.png' }}" alt="profile_image">
        </div>

        <div class="col-sm-9">
            <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" class="form-control">
                    <option value="">Choose</option>
                    @foreach($roles as $key => $role)
                        <option {{ $user->role_id == $key ? 'selected': '' }} value="{{ $key }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="is_active">Status</label>
                <select name="is_active" class="form-control">
                    <option {{ $user->is_active == 1 ? 'selected': '' }} value="1">Active</option>
                    <option {{ $user->is_active == 0 ? 'selected': '' }} value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo_id">Upload Image</label>
                <input type="file" name="photo_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Edit User" class="btn btn-primary">
            </div>
        </form>
        </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection