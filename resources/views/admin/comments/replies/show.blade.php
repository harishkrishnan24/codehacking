@extends('layouts.admin')

@section('content')
    @if (count($replies) > 0)
        <h1>Replies</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Reply</th>
                    <th>Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                    <tr>
                        <td>{{ $reply->id }}</td>
                        <td>{{ $reply->author }}</td>
                        <td>{{ $reply->email }}</td>
                        <td>{{ $reply->body }}</td>
                        <td><a href="{{ route('home.post', $reply->comment->post->id) }}">View Post</a></td>
                        <td>
                            @if ($reply->is_active == 1)
                                <form action="{{ route('admin.comments.replies.update', $reply->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="submit" value="Un-approve" class="btn btn-danger">
                                </form>
                            @else
                                <form action="{{ route('admin.comments.replies.update', $reply->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="PATCH">
                                    <input type="hidden" name="is_active" value="1">
                                    <input type="submit" value="Approve" class="btn btn-info">
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.comments.replies.destroy', $reply->id) }}" method="post">
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
        <h1 class="text-center">No Replies</h1>
    @endif
@endsection