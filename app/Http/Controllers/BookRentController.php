<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1 )->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view ('book-rent', ['users'=>$users, 'books'=>$books]);
    }
    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stok'){
            Session::flash('message', 'Tidak Dapat Menyewa Buku!, Karna Buku Tidak Tersedia'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('book-rent');

        }
        else{
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            
            if($count >= 3) {
                Session::flash('message', 'Tidak Dapat Menyewa Buku!, Karna Telah Mencapai Limit Peminjaman'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('book-rent');
            }
            else{
                try {
                    DB::beginTransaction();
                    //proses menambah data tabel rent_logs
                    RentLogs::create($request->all());
                    //proses edit data tabel rent_logs
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
    
                    Session::flash('message', 'Berhasil Menyewa Buku, Batas penyewaan adalah 3 hari'); 
                    Session::flash('alert-class', 'alert-success'); 
                    return redirect('book-rent');
    
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
           
        }
        
    }
    public function returnBook()
    {
        $users = User::where('id', '!=', 1 )->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-return',['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request)
    {
        //jika user dan buku yang dipilih benar, maka berhasil mengembalikan buku

        //jika user dan buku yang dipilih salah(tidak sesuai peminjaman), maka akan muncul eror
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        
        if($countData == 1){
            $rentData['actual_return_date'] = Carbon::now()->toDateString();
            $rentData->save();
            // tes tes update status buku setelah dikembaliikan
            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stok';
            $book->save();
            // sampesini

            Session::flash('message', 'Berhasil Mengembalikan Buku'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('book-return');
        }
        else{
                Session::flash('message', 'Gagal Mengembalikan Buku!, Silahkan Periksa Kembali User dan Buku yang di input'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('book-return');
        }
    }
}
