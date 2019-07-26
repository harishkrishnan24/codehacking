@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        <form method="post" action="{{ route('admin.categories.store') }}">
            {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Create Category" class="btn btn-primary">
        </div>
        </form>
    </div>

    <div class="col-sm-6">
        @if($categories)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at ? $category->created_at->diffForHumans() : '' }}</td>
                </tr>  
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection