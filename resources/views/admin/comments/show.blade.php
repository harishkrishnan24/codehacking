@extends('layouts.admin')

@section('content')
    @if (count($comments) > 0)
        <h1>Comments</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->author }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->body }}</td>
                        <td><a href="{{ route('home.post', $comment->post->id) }}">View Post</a></td>
                        <td>
                            @if ($comment->is_active == 1)
                                <form action="{{ route('admin.comments.update', $comment->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="submit" value="Un-approve" class="btn btn-danger">
                                </form>
                            @else
                                <form action="{{ route('admin.comments.update', $comment->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="is_active" value="1">
                                    <input type="submit" value="Approve" class="btn btn-info">
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="post">
                                        {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@endsection