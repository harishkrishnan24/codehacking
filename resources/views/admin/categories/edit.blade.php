@extends('layouts.admin')

@section('content')
    <h1>Update Category</h1>

    <div class="col-sm-6">
        <form method="post" action="{{ route('admin.categories.update', $category->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <input type="submit" value="Update Category" class="btn btn-primary">
        </div>
        </form>
    </div>
    <div class="col-sm-6">
        
    </div>
@endsection