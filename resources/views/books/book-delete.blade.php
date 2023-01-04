@extends('layouts.main-layouts')

@section('title', 'Hapus Buku')
   
@section('content')
    <div class="container">
        <div class=" d-flex flex-column justify-content-center align-items-center">
            <h2 class="mt-4">Apakah anda yakin ingin menghapus buku "{{ $book->title }}"</h2>
            <div class="my-4">
                <a href="{{ route('book-destroy',$book->slug) }}" class="btn btn-danger me-4">Ya, Hapus</a>
                <a href="/books" class="btn btn-info">Tidak, Batal Hapus</a>
            </div>
        </div>
    </div>    

@endsection