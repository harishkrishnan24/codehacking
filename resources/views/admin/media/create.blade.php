@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection

@section('content')
    <h1>Upload Media</h1>

    <form action="{{ route('admin.media.store') }}" method="post" enctype="multipart/form-data" class="dropzone">
        {{ csrf_field() }}
    </form>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection