@extends('layouts/app')

@section('title', 'Information of post')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
<div class="container">
    <div class="team-single">
        <div class="row">
            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                {{-- <div class="team-single-img">
                    <img class="w-100 rounded" src="{{$artwork->cover_image}}" alt="">
                </div> --}}
                <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h2 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">{{$post->title}}</h2>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <h3>Information is being updated...</h3>
                <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Description: </span>{{$post->content}}</p>
                {{-- <p class="sm-width-95 sm-margin-auto"><span class="fw-bold">Art type: </span>{{$post->genre}}</p> --}}
                {{-- <p class="sm-width-95 sm-margin-auto"><span class="fw-bold text-dark">Media link: </span><a href="{{$artwork->media_link}}">{{$artwork->media_link}}</a></p> --}}
            </div>
        </div>
    </div>
    <a href="{{ route('posts.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>

@endsection
