<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}
