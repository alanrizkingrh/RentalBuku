@extends('layouts.main-layouts')

@section('title', 'Tambah Kategori')
    
@section('content')
    <h1>Tambah Kategori Baru</h1>
    <div class="card">
        <div class="card-body">
            <div class="mt-2">
                <form action="category-add" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{ old('name') }}">
                    </div>
        
                    <div>
                        <button class="btn btn-success" type="submit">Save</button>
                        <a href="/categories" class="btn btn-danger" me-3>Back</a>
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
        </div>
    </div>
    
@endsection