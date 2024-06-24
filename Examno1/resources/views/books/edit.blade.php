@extends('layouts.app')
@section('title', 'Edit Information')
@section('content')
<div class="container mt-3">
    <h1>Edit Information</h1>
    <form action="{{ route('books.update', $book->bookid) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title}}" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author}}" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" class="form-control" value="{{ $book->genre}}" required>
        </div>

        {{-- <div class="input-group">
            <span class="input-group-text fw-bold bg-light">Tên thể loại</span> <!-- ten -->
            <select required name="GenreID" class="form-select"> <!-- name -->
                <option value="" selected disabled>Chọn thể loại</option>
                <?php
                $genres = [ // sửa thông tin trong bảng ngoại khóa 2 (genres)
                    1 => 'Life',
                    2 => 'Style',
                    3 => 'Vip',
                    4 => 'Food',
                    5 => 'Reader'
                ];
                foreach ($genres as $id => $genre) {
                    $selected = ($id == $book->getGenreID()) ? 'selected' : '';
                    echo "<option value=\"$id\" $selected>$genre</option>";
                }
                ?>
            </select>
        </div> --}}
        {{-- genre chọn chứ ko phải nhập --}}

        <div class="form-group">
            <label for="publicationYear">PublicationYear:</label>
            <input type="date" name="publicationYear" class="form-control" value="{{ $book->publicationYear}}" required>
        </div>
        <div class="form-group mt-3">

            <button type="submit" class="btn btn-success ml-2">Save</button>
        </div>

    </form>
    <a href="{{ route('books.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
</div>
@endsection('content')
