@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2 class="text-center">Danh sách bài viết</h2>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="posts/create"><button type="button" class="btn btn-outline-success">Tạo mới</button></a>
    <table class="table table-light table-striped align-middle mt-3">
        <thead>
            <tr>
                <th class="text-center" scope="col">STT</th> {{-- Sửa tên cột --}}
                <th class="text-center" scope="col">Tiêu đề</th>
                <th class="text-center" scope="col">Nội dung</th>
                <th class="text-center" colspan="3" scope="col">hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $keys => $post)
            <tr>
                <th scope="row">{{$keys + 1}}</th> {{-- $keys trả về một mảng của $posts --}}
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><a href="/posts/{{$post->id}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$post->id}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn chắc chắn muốn xóa thông tin này?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
