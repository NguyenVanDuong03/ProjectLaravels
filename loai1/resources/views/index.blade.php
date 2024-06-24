@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2 class="text-center">Danh sách bài viết</h2> {{-- Sua tieu de--}}
@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="posts/create"><button type="button" class="btn btn-outline-success">Tạo mới</button></a>
    <table class="table text-center border-dark">
        <thead>
            <tr>
                <th scope="col">#</th> {{-- Sửa tên cột --}}
                <th scope="col">Tiêu đề</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Chi tiết</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->post_id}}</th>
                <td>{{$post->post_Name}}</td>
                <td>{{$post->gender}}</td>
                <td>{{$post->birthday}}</td>
                <td>
                    @if (filter_var($post->image, FILTER_VALIDATE_URL))
                        <!-- Nếu cột image là một đường dẫn URL -->
                        <img style="width: 100px; max-height: 100px; object-fit: contain"
                             src="{{ $post->image }}"
                             alt="">
                    @else
                        <!-- Nếu cột image chỉ là tên tệp trong thư mục storage -->
                        <img style="width: 100px; max-height: 100px; object-fit: contain"
                             src="{{ asset('storage/'.$post->image) }}"
                             alt="">
                    @endif
                </td>

                <td>{{$post->phone}}</td>
                <td><a href="/posts/{{$post->post_id}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/posts/{{$post->post_id}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$post->post_id}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$post->post_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('posts.destroy', $post->post_id) }}" method="POST">
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
<script>
    // Ẩn thông báo sau 5 giây
    setTimeout(function(){
        $('#success-alert').fadeOut('slow');
    }, 4000);
</script>
@endsection
