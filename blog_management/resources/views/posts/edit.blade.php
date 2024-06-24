@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>
    <form action="{{ route('posts.update', $post->post_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title}}" required>
        </div>
        <div class="form-group">
            <label for="content">content:</label>
            <input type="text" name="content" class="form-control" value="{{ $post->content}}" required>
        </div>
        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>

    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
