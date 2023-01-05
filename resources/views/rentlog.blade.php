<!--Penyewaanbuku-->
@extends('layouts.main-layouts')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <table class=" table table-responsive table-hover caption-top ">
                <caption><h2>Riwayat Penyewaan</h2></caption>
                        <x-rent-log-table :rentlog='$rent_logs' />
                        
                </div>
            </div>
@endsection