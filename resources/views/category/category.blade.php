@extends('layouts.main-layouts')

@section('title', 'Kategori Buku')
   
@section('content')
    <h1>Daftar Kategori</h1>

    <div class="mt-1">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                <a href="/category-add" class="btn btn-success" me-3>Tambah Kategori +</a>
                <a href="/category-deleted" class="btn btn-secondary">Lihat Data Yang Dihapus</a>
            </div>
            <div class="my-3">
                <table class="table table-hover ">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $item)
                        <tr>
                            <td>{{ $index + $categories->firstItem() }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('category-edit', $item->slug) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('category-delete', $item->slug) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $categories->links() }}
        </div>
    </div>
    
@endsection