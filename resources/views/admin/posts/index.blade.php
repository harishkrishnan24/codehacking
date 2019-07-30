@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
        <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Link</th>
                <th>Comments</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            <tbody>
                @if($posts)
                    @foreach ($posts as $post)
                    <tr>
                       <td>{{ $post->id }}</td>
                        <td><img src="{{ $post->photo ?$post->photo->file : '/images/placeholder_posts.png' }}" alt="post_image" height="50" width="60"></td>
                       <td>{{ $post->user->name }}</td>
                       <td>{{ $post->category->name }}</td>
                       <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                       <td>{{ $post->body }}</td>
                       <td><a href="{{ route('home.post', $post->id) }}">View Post</a></td>
                       <td><a href="{{ route('admin.comments.show', $post->id) }}">View Comments</a></td>
                       <td>{{ $post->created_at->diffForHumans() }}</td>
                       <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </thead>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts->render() }}
        </div>
    </div>
@endsection