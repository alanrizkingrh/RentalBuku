<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $rentLogs = RentLogs::with(['user','book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rent_logs' => $rentLogs]);
   }
   public function index()
   {
    $users = User::where('status','active')->where('role_id',2)->get();

    return view('users/user', ['users'=> $users]);
   }
   public function registeredUser()
   {
    $registeredUsers = User::where('status','inactive')->where('role_id',2)->get();
    return view ('users/registered-user', ['registeredUsers' => $registeredUsers]);
   }
    public function show($slug){

    $user = User::where('slug',$slug)->first();
    $rentLogs = RentLogs::with(['user','book'])->where('user_id', $user->id)->get();

    return view('users/user-detail', ['user' => $user, 'rent_logs' => $rentLogs]);
    }
    public function approve($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-detail/'.$slug)->with('status', 'Berhasil Meng-Approve user!');
    }
    public function aktif($slug)
    {
        $user = User::where('slug',$slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('registered-user')->with('status', 'Berhasil Meng-Approve user!');
    }
    public function delete($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view ('users/user-delete',['user' =>$user]);
    }
    public function destroy($slug)
    {   
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'Berhasil Menghapus User!');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        // //tes
        // $bannedUsers = User::paginate(5);
        // //sampai sini
        return view('users/user-banned',['bannedUsers' => $bannedUsers]);
    }
    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'Berhasil Me-Restore user!');
    }

}
