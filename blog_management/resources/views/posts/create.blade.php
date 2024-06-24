@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h1>Create new post</h1>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <div class="form-group mt-1">
            <label class="fw-bold" for="image">Avatar:</label>
            <input type="file" name="image" class="form-control">
        </div> --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group mt-1">
            <label class="fw-bold" for="content">content:</label>
            <input type="text" name="content" class="form-control" required>
        </div>
        {{-- <div class="form-group mt-1">
            <label class="fw-bold" for="biography">Bio:</label>
            <textarea type="text" name="biography" class="form-control" required></textarea>
        </div> --}}
        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>
    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
