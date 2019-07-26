@extends('layouts.admin')

@section('content')
    <h1>Update Category</h1>

    <div>
        <form method="post" action="{{ route('admin.categories.update', $category->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group pull-left">
            <input type="submit" value="Update Category" class="btn btn-primary">
        </div>
        </form>
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="pull-right">
                    {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <input type="submit" value="Delete Category" class="btn btn-danger">
            </div>
        </form>
    </div>
@endsection