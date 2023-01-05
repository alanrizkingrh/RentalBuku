<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index(Request $request)
    {
        $rentLogs = RentLogs::with(['user','book'])->get();
        return view ('rentlog', ['rent_logs' => $rentLogs]);
    }
}
