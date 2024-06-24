@extends('layouts.app')
@section('title', 'Chỉnh sửa thông tin')
@section('content')
<div class="container mt-3">
    <h1>Chỉnh sửa thông tin</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title}}" required>
        </div>
        <div class="form-group">
            <label for="body">Nội dung:</label>
            <input type="text" name="body" class="form-control" value="{{ $post->body}}" required>
        </div>

        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Lưu</button>
        </div>

    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="mt-3 btn btn-warning">Quay lại</button></a>
</div>
@endsection('content')
