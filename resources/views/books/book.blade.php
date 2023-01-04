@extends('layouts.main-layouts')

@section('title', 'Book')

@section('content')
<h1>Daftar Buku</h1>

<div class="mt-1">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="card">
    <div class="card-body">

        <form action="" method="get">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="mt-2">
                        <a href="/book-add" class="btn btn-success" me-3>Tambah Buku +</a>
                        <a href="/book-deleted" class="btn btn-secondary">Lihat Buku Yang Dihapus</a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" name="title" placeholder="Search Books" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ old('title') }}" >
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>

    <div class="my-3">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th><!--book_code-->
                    <th>Judul Buku</th><!--title-->
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>      
                            @if ($item->cover!=='')
                                <img src="{{ asset('storage/cover/'.$item->cover) }}" alt="" width="100px" draggable="false"><br>
                            @else 
                                <img src="{{ asset('image/no_cover_available.png') }}" alt="" width="100px" draggable="false"><br>
                            @endif
                            {{ $item->title }}
                        </td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} /
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('book-edit', $item->slug) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('book-delete', $item->slug) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
  </div>

@endsection