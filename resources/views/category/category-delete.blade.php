@extends('layouts.main-layouts')

@section('title', 'Hapus Kategori')
   
@section('content')
    <div class="container">
        <div class=" d-flex flex-column justify-content-center d-flex align-items-center">
            <h2 class="mt-4">Apakah anda yakin ingin menghapus kategori "{{ $category->name }}"</h2>
            <div class="my-4">
                <a href="{{ route('category-destroy',$category->slug) }}" class="btn btn-danger me-4">Ya, Hapus</a>
                <a href="/categories" class="btn btn-info">Tidak, Batal Hapus</a>
            </div>
        </div>
    </div>    

@endsection