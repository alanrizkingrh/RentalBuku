<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class BookRentController extends Controller
{
    public function index()
    {
        return view ('book-rent');
    }
    public function store()
    {
        return view('book-return');
    }
}
