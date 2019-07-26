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
                       <td>{{ $post->category_id }}</td>
                       <td>{{ $post->title }}</td>
                       <td>{{ $post->body }}</td>
                       <td>{{ $post->created_at->diffForHumans() }}</td>
                       <td>{{ $post->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </thead>
    </table>
@endsection