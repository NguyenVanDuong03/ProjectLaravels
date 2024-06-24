@extends('layouts.app')
@section('title', 'Chỉnh sửa')
@section('content')
<div class="container mt-3 bg-light p-5 rounded-3">
    <h1>Chỉnh sửa thông tin</h1>
    <form action="{{ route('motelsofts.update', $motelsoft->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Mã phòng:</span>
            <select class="form-select" name='maphong'>
                <option class="text-muted" value="{{$motelsoft->maphong}}">{{$motelsoft->maphong}}</option>
                 @foreach($motelsofts->unique('maphong') as $motelsoft) {{--lay gia tri duy nhat ma khong bi lap--}}
                    <option value="{{$motelsoft->maphong}}">{{$motelsoft->maphong}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="fw-bold" for="tenkhach">Tên khách:</label>
            <input type="text" name="tenkhach" class="form-control" value="{{ $motelsoft->tenkhach}}" required>
        </div>
        <div class="form-group">
            <label class="fw-bold" for="cccd">CCCD:</label>
            <input type="text" name="cccd" class="form-control" value="{{ $motelsoft->cccd}}" required>
        </div>
         {{-- date --}}
         <div class="form-group mt-1">
            <label class="fw-bold" for="thoigiannhanphong">Thời gian nhận phòng:</label>
            <input type="datetime-local" name="thoigiannhanphong" class="form-control" value="{{$motelsoft->thoigiannhanphong}}" required>
        </div>

        {{-- sogiothue --}}
        <div class="input-group mt-2">
            <span class="input-group-text fw-bold bg-light">Số giờ thuê</span>
            <select class="form-select" name='sogiothue' id="sogiothueSelect">
                <option class="text-muted" value="{{$motelsoft->sogiothue}}">{{$motelsoft->sogiothue}}</option>
                @for($i = 1; $i<=24; $i++)
                    <option value="{{$i}}" data-dongiatheogio="{{$i < 6 ? 2 : ($i < 13 ? 3 : 4)}}">{{$i}}</option>
                @endfor
            </select>
        </div>

        <div class="form-group mt-1">
            <label class="fw-bold" for="dongiatheogio">Đơn giá theo giờ:</label>
            <input type="text" name="dongiatheogio" class="form-control" id="dongiatheogioInput" readonly required>
        </div>

        <div class="form-group mt-3">

            <button type="submit" class="btn btn-primary ml-2">Lưu</button>
        </div>
    </form>
    <a href="{{ route('motelsofts.index') }}"><button type="button" class="mt-3 btn btn-warning">Quay lại</button></a>
</div>
<script>
    // Lắng nghe sự kiện thay đổi trên thẻ select
    document.getElementById('sogiothueSelect').addEventListener('change', function() {
        // Lấy giá trị của số giờ thuê
        var sogiothue = this.value;

        // Lấy đơn giá theo giờ từ thuộc tính data-dongiatheogio của option được chọn
        var dongiatheogio = this.options[this.selectedIndex].getAttribute('data-dongiatheogio');

        // Đặt giá trị cho ô "Đơn giá theo giờ"
        document.getElementById('dongiatheogioInput').value = dongiatheogio;
    });
</script>
@endsection('content')
