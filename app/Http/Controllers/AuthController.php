<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function authenticating(Request $request){
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        //cek apakah login vallid
        if (Auth::attempt($credentials)) {
            //cek apakah user status = active, kalau tidak akan di redirect ke login ulang
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Akun anda belum disetujui oleh admin, Silahkan hubungi Admin RentalBuku!');
                return redirect('/login');
                //return redirect('login')->with('status', 'Akun anda belum di aktiv, Silahkan hubungi Admin RentalBuku!');
            }
            $request->session()->regenerate();
            if(Auth::user()->role_id == 1) {
                //return redirect()->route('dashboard');
                return redirect('dashboard');//index
            }
            if(Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            // return redirect('');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid !');
        return redirect('/login');
    }
    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function registerProcess(request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'password' => 'max:255',
            'password' => 'required',
        ]);
       
        $request ['password'] = Hash::make($request->password);
        $user =User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Berhasil membuat akun, Harap menunggu persetujuan admin untuk login !');
        return redirect('register');
    }
}
