@extends('layouts.mainlayouts')

@section('title', 'Edit Buku')
    
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h1>Edit Buku </h1>

<div class="card">
    <div class="card-body">
        <div class="mt-2 ">
            <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Kode Buku</label>
                    <input type="text" class="form-control" name="book_code" placeholder="Book's Code" value="{{ $book->book_code }}" >
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" name="title" placeholder="Book Title" value="{{  $book->title }}" >
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image Book</label>
                    <input type="file" class="form-control" name="image" placeholder="Book Cover" >
                </div>
                <div class="mb-3">
                    <label for="currentImage" class="form-label" style="display: block">Sampul Buku Saat Ini</label>
                    @if ($book->cover!=='')
                        <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="200px">
                    @else 
                        <img src="{{ asset('image/no_cover_available.png') }}" alt="" width="200px">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="=mb-3">
                    <label for="currentCategory" class="form-label">Kategori Saat Ini</label>
                    <ul>
                        @foreach ($book->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <button class="btn btn-success" type="submit">Save</button>
                    <a href="/books" class="btn btn-danger" me-3>Back</a>
                </div>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
    </div>
</div>

  
@endsection