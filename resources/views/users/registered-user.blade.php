@extends('layouts.main-layouts')

@section('title', 'User')

@section('content')
    <h1>Daftar User Baru</h1>
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
                <a href="/users" class="btn btn-danger" me-3>Back</a>
            </div>
            <div class="my-3">
                <table class="table table-hover ">
                    <thead class="table-dark" >
                        <tr>
                            <th>No</th>
                            <th>username</th>
                            <th>phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registeredUsers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username }}</td>
                            <td>
                                @if ($item->phone)
                                {{ $item->phone }}
                                @else
                                    ---
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user-detail',$item->slug) }}" class="btn btn-info">Detail</a>
                                <a href="{{ route('user-aktif', $item->slug) }}" class="btn btn-warning" me-3>Approve</a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection