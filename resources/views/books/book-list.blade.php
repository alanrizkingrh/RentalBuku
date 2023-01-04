@extends('layouts.main-layouts')

@section('title', 'Book')

@section('content')

    <form action="" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select value="" name="category" id="category" class="form-control">
                    <option value="">Pilih Kategori Buku</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Search Books" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ old('title') }}" >
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                List Buku
            </div>
                <div class="row">

                @foreach ($books as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="card mt-3 h-100">
                            <img src="{{ $item->cover != null? asset('storage/cover/'.$item->cover) : asset('image/no_cover_available.png') }}" class="card-img-top" draggable="false" width="150px" height="300px">
                            <div class="card-body text-bottom">
                                <h5 class="card-title">{{ $item->book_code }}</h5>
                                <p class="card-text">Judul : {{ $item->title }}</p>
                                <hr>
                                <p class="card-text fst-italic mt-0">Kategori :<br>
                                    @foreach ($item->categories as $category)
                                        {{ $category->name }}/
                                    @endforeach</p>
                                <p class="card-text text-end fw-bold {{ $item->status == 'in stok' ? 'text-success': 'text-danger' }}"> {{-- ini ternary operator --}}
                                    {{ $item->status }}
                                </p>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
@endsection