<?php

namespace App\Http\Controllers;

use App\Imports\BaseImports;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Validator;

class AdminController extends Controller
{
    // View Admin ( GET )
    public function index(){

        return view('admin/home');
    }
    public function users(){
        $mhs = DB::table('users')->where('role', 'mhs')
            ->get();
        return view('admin/users', compact('mhs'));
    }
    public function addMhs(Request $request){
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string',
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {
            $user = User::create([
                'nim' => $request->nim,
                'name' => $request->name,
                'password' => md5($request->nim),
                'role' => 'mhs',
            ]);
            return redirect()->back();
        } catch (\Exception $err){
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
    }
    public function dwlaporan(){
        $soals = Soal::all();
        return view('admin.dwlaporan', compact('soals'));
    }
    public function addMhsExcel(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|file',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Username & Password harap di Isi');
        }
        try {
            $data = Excel::toArray(new BaseImports(), $request->file);
            foreach ($data as $usr){
                foreach ($usr as $s){
                    if ($s[0] != "NIM" && $s[1] != "Name"){
                        $user = User::create([
                            'nim' => $s[0],
                            'name' => $s[1],
                            'password' => md5($s[0]),
                            'role' => 'mhs',
                        ]);
                    }
                }

            }
            return redirect('/admin/users');

        } catch (\Exception $err){
            dd($err);
        }
    }
}
