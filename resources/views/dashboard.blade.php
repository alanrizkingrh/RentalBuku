@extends('layouts.main-layouts')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{ Auth::user()->username }}</h1>
    
    <div class="row mt-3">
        <div class="col-lg-4">
            <div class="card-data books ">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Books</div>
                        <div class="card-count">{{ $book_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data categories">
                <div class="row">
                    <div class="col-6"><i class="bi bi-tags"></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Categories</div>
                        <div class="card-count">{{ $category_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data users">
                <div class="row">
                    <div class="col-6"><i class="bi bi-person-lines-fill"></i></i></div>
                    <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                        <div class="card-desc">Users</div>
                        <div class="card-count">{{ $user_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover caption-top">
                  <caption><h2>Riwayat Penyewaan Semua User</h2></caption>
                        <tr>
                            <th>No.</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tgl Peminjaman</th>
                        <th>Batas Peminjaman</th>
                        <th>Tgl pengembalian</th>
                        </tr>
                  </div>
            </div>
        
@endsection