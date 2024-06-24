@extends('layouts.app')
@section('title', 'Thêm mới')
@section('content')
<div class="container mt-3">
    <h1>Tạo mới</h1>
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf


        {{-- text --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="title">Tiêu đề:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        {{-- option Gioi tinh --}}
        {{-- <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Giới tính</span>
            <select class="form-select" name='gender'>
                 @foreach($posts->unique('gender') as $post)
                    <option value="{{$post->gender}}">{{$post->gender}}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="form-group mt-1">
            <label class="fw-bold" for="content">Nội dung:</label>
            <input type="text" name="content" class="form-control" required>
        </div>
        {{-- date --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="publication">Ngày sản xuất:</label>
            <input type="date" name="publication" class="form-control" required>
        </div>
        {{-- text --}}




        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning mt-3">Quay lại</button></a>
</div>
@endsection('content')
