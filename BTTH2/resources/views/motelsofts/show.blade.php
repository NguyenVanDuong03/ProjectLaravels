@extends('layouts/app')

@section('title', 'Thông tin chi tiết')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <h3 class="text-center text-success">Thông tin chi tiết</h3>
            <table class="table table-light table-striped align-middle">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">Tiêu đề</th>
                        <th class="col-6" scope="col">Thông tin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mã phòng</td>
                        <td>{{$motelsoft->maphong}}</td>
                    </tr>
                    <tr>
                        <td>Tên khách</td>
                        <td>{{$motelsoft->tenkhach}}</td>
                    </tr>
                    <tr>
                        <td>CCCD</td>
                        <td>{{$motelsoft->cccd}}</td>
                    </tr>
                    <tr>
                        <td>Thời gian nhận phòng</td>
                        <td>{{$motelsoft->thoigiannhanphong}}</td>
                    </tr>
                    <tr>
                        <td>Thời gian trả phòng</td>
                        <td>{{$motelsoft->thoigiantraphong}}</td>
                    </tr>
                    <tr>
                        <td>Số giờ thuê</td>
                        <td>{{$motelsoft->sogiothue}}</td>
                    </tr>
                    <tr>
                        <td>Đơn giá theo giờ</td>
                        <td>{{$motelsoft->dongiatheogio}}</td>
                    </tr>
                    <tr>
                        <td>Tổng tiền</td>
                        <td>{{$motelsoft->tongtien}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ route('motelsofts.index') }}"><button type="button" class="btn btn-warning">Quay lại</button></a>
</div>

@endsection
