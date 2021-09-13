<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MhsController extends Controller
{
    public function home(){

        return view('mhs.home');
    }
    public function profile(){
        $temp = DB::table('users')
            ->where('users.id', Auth::user()->id)
            ->join('profiles', 'users.id', '=', 'profiles.id_user')
            ->first();
        if ($temp == null){
            DB::table('profiles')->insert([
               'id_user' => Auth::user()->id,
            ]);
        }
        $profile = DB::table('users')
            ->where('users.id', Auth::user()->id)
            ->join('profiles', 'users.id', '=', 'profiles.id_user')
            ->first();

        return view('mhs.profile', compact('profile'));
    }
    public function saveProfile(Request $request){
        $profile = DB::table('users')
            ->where('users.id', Auth::user()->id)
            ->join('profiles', 'users.id', '=', 'profiles.id_user')
            ->get();

        if($profile->isEmpty()){
            $temp = DB::table('profiles')->insert([
//                'name' => $request->name,
//                'nim' => $request->nim,
                'email' => $request->email,
                'ktp' => $request->ktp,
                'noHp' => $request->phone1,
                'noHp2' => $request->phone2,
                'tempatLahir' => $request->tempat,
                'tglLahir' => $request->tgl,
                'alamat' => $request->alamat,
                'kodePos' => $request->kodepos,
                'kewarganegaraan' => $request->warganegara,
                'agama' => $request->agama,
                'status' => $request->status,
                'id_user' => Auth::user()->id,
            ]);
        }else{
            $temp = DB::table('profiles')
                ->where('id_user', Auth::user()->id)
                ->update([
                'email' => $request->email,
                'ktp' => $request->ktp,
                'noHp' => $request->phone1,
                'noHp2' => $request->phone2,
                'tempatLahir' => $request->tempat,
                'tglLahir' => $request->tgl,
                'alamat' => $request->alamat,
                'kodePos' => $request->kodepos,
                'kewarganegaraan' => $request->warganegara,
                'agama' => $request->agama,
                'status' => $request->status,
                'id_user' => Auth::user()->id,
            ]);
        }
        return redirect('/mhs/profile');
    }
}
