@extends('layouts.mainlayouts')

@section('title', 'Kategori Terhapus')
   
@section('content')
    <h1>Daftar Kategori Yang Terhapus</h1>

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
                <a href="/categories" class="btn btn-danger" me-3>Back</a>
            </div>
            <div class="my-2">
                <table class="table table-danger table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deletedCategories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="/category-restore/{{ $item->slug }} " class="btn btn-warning">Restore</a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection