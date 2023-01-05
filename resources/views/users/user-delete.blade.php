@extends('layouts.main-layouts')

@section('title', 'Hapus User')
   
@section('content')
    <div class="container">
        <div class=" d-flex flex-column justify-content-center align-items-center">
            <h2 class="mt-4">Apakah anda yakin ingin menghapus akun "{{ $user->username }}"</h2>
            <div class="my-4">
                <a href="{{ route('user-destroy',$user->slug) }}" class="btn btn-danger me-4">Ya, Hapus</a>
                <a href="/users" class="btn btn-info">Tidak, Batal Hapus</a>
            </div>
        </div>
    </div>    

@endsection