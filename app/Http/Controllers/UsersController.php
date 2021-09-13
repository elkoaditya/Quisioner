<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UsersController extends Controller
{
    public function createAdmin(){
        try {
            $temp = User::create([
                'name' => "Admin",
                'nim' => 'admin',
                'password' => md5("admin123123"),
                'role' => 'admin',
            ]);

        } catch (\Exception $err){
            dd($err);
        }
        return "Data Admin berhasil di bikin";
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {
            $user = DB::table('users')
                ->where([
                    'nim' => $request->username,
                    'password' => md5($request->password),
                ])
                ->first();
            if(!$user){
                return redirect()->back()->with('message', 'Username & Password Salah');
            }
            Auth::loginUsingId($user->id);
            if($user->role == 'admin'){
                return redirect('/admin/home');
            }else if ($user->role == 'mhs'){
                return redirect('/mhs/home');
            }else{
                return "Oh this Snap";
            }
        } catch (\Exception $err){
            dd($err);
            return redirect()->back()->with('message', 'something went wrong');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('message', 'Berhasil Logout');
    }
    public function updateUser($id){
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.userupdate', compact('user'));
    }
    public function saveUpdate(Request $request){
        try {
            $temp = DB::table('users')->where('id', $request->id)->update([
               'nim' => $request->nim,
               'name' => $request->name,
               'password' => md5($request->password),
               'role' => $request->role,
            ]);
        } catch (\Exception $err){
            dd($err);
        }

        return redirect('/admin/users');
    }
}
