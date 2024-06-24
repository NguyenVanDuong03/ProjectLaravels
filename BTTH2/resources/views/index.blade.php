@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <h2 class="text-center">Danh sách</h2>
@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
    @endif
    <a href="motelsofts/create"><button type="button" class="btn btn-outline-success">Tạo mới</button></a>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Mã phòng</th>
                <th scope="col">Tên khách</th>
                {{-- <th scope="col">CCCD</th> --}}
                <th scope="col">Thời gian nhận phòng</th>
                {{-- <th scope="col">Thời gian trả phòng</th> --}}
                <th scope="col">Số giờ thuê</th>
                <th scope="col">Đơn giá theo giờ</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col" colspan="3">Hành động</th>
                {{-- <th scope="col">Sửa</th>
                <th scope="col">Xóa</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach($motelsofts as $motelsoft)
            <tr>
                <th scope="row">{{$motelsoft->maphong}}</th>
                <td>{{$motelsoft->tenkhach}}</td>
                {{-- <td>{{$motelsoft->cccd}}</td> --}}
                <td>{{$motelsoft->thoigiannhanphong}}</td>
                {{-- <td>{{$motelsoft->thoigiantraphong}}</td> --}}
                <td>{{$motelsoft->sogiothue}}</td>
                <td>{{$motelsoft->dongiatheogio}}</td>
                <td>{{$motelsoft->tongtien}}</td>
                <td><a href="/motelsofts/{{$motelsoft->id}}"><button type="button" class="btn btn-info"><i class="fa-regular fa-eye"></i></button></a></td>
                <td><a href="/motelsofts/{{$motelsoft->id}}/edit"><button type="button" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$motelsoft->id}}"><i class="fa-regular fa-trash-can"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$motelsoft->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form action="{{ route('motelsofts.destroy', $motelsoft->id) }}" method="POST">
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
    }, 3500);
</script>
@endsection


