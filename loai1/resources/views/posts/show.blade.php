@extends('layouts/app')

@section('title', 'Information of post')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <h3 class="text-center text-success">Thông tin</h3>
            <table class="table table-light table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Tiêu đề</th>
                        <th class="col-6" scope="col">Thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mã</td>
                        <td>{{$post->post_id}}</td>
                    </tr>
                    <tr>
                        <td>Tên</td>
                        <td>{{$post->post_Name}}</td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>{{$post->gender}}</td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>{{$post->birthday}}</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td>
                            @if(strpos($post->image, 'http') === 0)
                            <!-- Loại <img> cho trường hợp hình ảnh trực tuyến -->
                            <img style="width: 300px; max-height: 300px;object-fit:cover;" class="w-100" src="{{ $post->image }}" alt="Hình ảnh">
                            @else
                            <!-- Loại <img> cho trường hợp hình ảnh trong storage -->
                            <img style="width: 100%; max-height: 500px;object-fit:cover;" src="{{ asset('storage/' . $post->image) }}" alt="Hình ảnh">
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{$post->phone}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning">Quay lại</button></a>
</div>

@endsection
