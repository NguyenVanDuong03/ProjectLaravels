@extends('layouts.app')
@section('title', 'Chỉnh sửa')
@section('content')
<div class="container mt-3">
    <h1>Chỉnh sửa thông tin</h1>
    <form action="{{ route('posts.update', $post->post_id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{ $post->name}}" required>
        </div>
        {{-- gender --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Giới tính</span>
            <select class="form-select" name='gender'>
                <option class="text-muted" value="{{$post->gender}}">{{$post->gender}}</option>
                 @foreach($posts->unique('gender') as $post) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$post->gender}}">{{$post->gender}}</option>
                @endforeach
            </select>
        </div>
        {{-- date --}}
        <div class="form-group mt-1">
            <label class="fw-bold" for="birthday">Ngày sinh:</label>
            <input type="date" name="birthday" class="form-control" value="{{$post->birthday}}" required>
        </div>
        {{-- text --}}
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" name="phone" class="form-control" value="{{ $post->phone}}" required>
        </div>


        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('posts.index') }}"><button type="button" class="mt-3 btn btn-warning">Quay lại</button></a>
</div>
@endsection('content')
