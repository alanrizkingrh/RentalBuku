@extends('layouts.main-layouts')

@section('title', 'Profile')

@section('content')
    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover caption-top">
                <caption><h2>Riwayat Penyewaan Anda</h2></caption>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
@endsection