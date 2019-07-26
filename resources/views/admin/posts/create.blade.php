@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row">
        <form method="post" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Choose</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photo_id">Upload Image</label>
            <input type="file" name="photo_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea name="body" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Create Post" class="btn btn-primary">
        </div>
    </form>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection