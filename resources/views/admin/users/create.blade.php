@extends('layouts.admin')
@section('content')
    <h1>Create Users</h1>

    <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" class="form-control">
                <option value="">Choose</option>
                @foreach($roles as $key => $role)
                    <option value="{{ $key }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">Status</label>
            <select name="is_active" class="form-control">
                <option value="1">Active</option>
                <option value="0" selected>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="file">Upload Image</label>
            <input type="file" name="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Create User" class="btn btn-primary">
        </div>
    </form>
@include('includes.form_error')
@endsection