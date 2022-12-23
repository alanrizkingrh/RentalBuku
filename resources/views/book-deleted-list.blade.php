@extends('layouts.mainlayouts')

@section('title', 'Buku Terhapus')
   
@section('content')
    <h1>Daftar Buku Yang Terhapus</h1>

    <div class="mt-1">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mt-2 d-flex justify-content-end">
                <a href="/books" class="btn btn-danger" me-3>Back</a>
            </div>
            <div class="my-2">
                <table class="table table-hover table-danger">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Buku</th><!--book_code-->
                            <th>Judul Buku</th><!--title-->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedBooks as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="/book-restore/{{ $item->slug }} " class="btn btn-warning">Restore</a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection