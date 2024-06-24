@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
<div class="d-flex justify-content-center container pt-5 pb-5 align-items-center gap-3">
    <div class="card" style="width: 18rem;">
      <div class="card-body d-flex flex-column align-items-center">
        <h6 class="card-title text-primary">Số bài viết</h6>
        <h5 class="h5">
          {{ $postscount }}
        </h5>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body d-flex flex-column align-items-center">
        <h6 class="card-title text-primary">Số bài viết</h6>
        <h5 class="h5">
          {{ $postscount }}
        </h5>
      </div>
    </div>
  </div>
@endsection
