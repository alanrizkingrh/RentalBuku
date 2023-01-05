@extends('layouts.main-layouts')

@section('title', 'Detail User')

@section('content')
    <h1>Detail User</h1>
    
    <div class="card ">
        <div class="card-body">
            <div class="my-2 ">
                <div class="mt-1">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="mt-2 d-flex justify-content-end">
                    @if ($user->status == 'inactive')
                        <a href="{{ route('user-approve',$user->slug) }}" class="btn btn-warning  me-2">Approve</a>
                    @endif
                    <a href="/users" class="btn btn-danger">Back</a>
                </div>
                <div class="mb-2">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="" id="" class="form-control" readonly value="{{ $user->username }}">
                </div>
            </div>
            <div class="my-2 ">
                <div class="mb-2">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" name="" id="" class="form-control" readonly value="{{ $user->phone }}">
                </div>
            </div>
            <div class="my-2 ">
                <div class="mb-2">
                        <label for="" class="form-label">Address</label>
                        <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none">{{ $user->address }}</textarea>
                </div>
            </div>
            <div class="my-2 ">
                <div class="mb-2">
                        <label for="" class="form-label">Status</label>
                        <input type="text" name="" id="" class="form-control" readonly value="{{ $user->status }}">
                </div>
            </div>
        </div>
    </div>
@endsection