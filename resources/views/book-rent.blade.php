@extends('layouts.main-layouts')

@section('title', 'Penyewaan Buku')
   
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <div class="login-logo">
            <p><b><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
            </svg>  rental</b>Buku</p>
        </div>

        <div class="mt-1">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="book-rent" method="POST">
            @csrf
            <div class="card">
                <div class="card-header text-bg-warning">
                    <h2>Form Penyewaan Buku</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user_id" id="user" class="form-control inputbox">
                            <option value="">Pilih User Peminjam</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="book" class="form-label">Book</label>
                        <select name="book_id" id="book" class="form-control inputbox">
                            <option value="">Pilih Buku</option>
                            @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->book_code }} {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inputbox').select2()});
            $(window).resize(function() {
    $('.select2').css('width', "100%");
        });
    </script>
@endsection