@extends('layouts.admin')

@section('content')
    <h1>Media</h1>
    @if($photos)
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Created Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td><img src="{{ $photo->file }}" alt="image" height="50" width="60"></td>
                    <td>{{ $photo->created_at ? $photo->created_at->diffForHumans(): '' }}</td>
                    <td>
                        <form action="{{ route('admin.media.destroy', $photo->id) }}" method="POST">
                    {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group">
                <input type="submit" value="Delete" class="btn btn-danger">
            </div>
        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection