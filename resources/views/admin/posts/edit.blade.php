@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>
    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive img-rounded" src="{{ $post->photo ? $post->photo->file: '/images/placeholder_posts.png' }}" alt="post_image">
        </div>
        <div class="col-sm-9">
        <form method="post" action="{{ route('admin.posts.update', $post->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Choose</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}" {{ $post->category_id == $key ? 'selected': '' }}>{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="photo_id">Upload Image</label>
            <input type="file" name="photo_id" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea name="body" class="form-control" rows="5">{{ $post->body }}</textarea>
        </div>
        <div class="form-group pull-left">
            <input type="submit" value="Update Post" class="btn btn-primary">
        </div>
    </form>
    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="pull-right">
                    {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <input type="submit" value="Delete Post" class="btn btn-danger">
            </div>
    </form>
    </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>
@endsection