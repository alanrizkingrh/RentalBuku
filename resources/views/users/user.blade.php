@extends('layouts.main-layouts')

@section('title', 'Users')

@section('content')
    <h1>Daftar User</h1>
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
                <a href="/registered-user" class="btn btn-primary" me-3>New Registered User</a>
                <a href="/user-banned" class="btn btn-secondary">Lihat User Yang Di-BANNED</a>
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
                        @foreach ($users as $index=>$item)
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
                                    <a href="{{ route('user-ban',$item->slug) }}" class="btn btn-danger">Ban user</a>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection