<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KuisionerController extends Controller
{
    public function index(){
        $soal = DB::table('soals')->get();
        $fix = [];
        foreach ($soal as $s){
            $temp = DB::table('pilgans')
                ->where('id_soal', $s->id)
                ->get()->toArray();
            array_push($fix, [
                'id' => $s->id,
                'soal' => $s->name,
                'pilgan' => $temp,
                'type' => $s->type,
                'created_at' => $s->created_at,
            ]);
        }
        return view('admin.kuisioner', compact('fix'));
    }
    public function analisis(Request $request){
        $kuis = DB::table('soals')->get();
        return view('admin.analisis', compact('kuis'));
    }
    public function detailAnalisis(Request $request, $id){
        $pilgan = DB::table('pilgans')->where('id_soal', $id)->get();
        $pil = [];
        $answer = [];
        foreach ($pilgan as $p){
            array_push($pil, $p->name);
            array_push($answer, jawaban::where('id_soal', $id)->where('id_jawaban', $p->id)->get()->count());
        }
        return view('admin.detailkuisioner', compact('pil', 'answer'));
    }
    public function submitKuis(){
        $soal = DB::table('soals')->get();
        $fix = [];
        foreach ($soal as $s){
            $temp = DB::table('pilgans')
                ->where('id_soal', $s->id)
                ->get()->toArray();
            array_push($fix, [
                'id' => $s->id,
                'soal' => $s->name,
                'pilgan' => $temp,
                'type' => $s->type,
                'created_at' => $s->created_at,
            ]);
        }
        return view('mhs.kuisioner', compact('fix'));
    }
    public function saveKuis(Request $request){
        try {
            $temp = jawaban::where('id_user', Auth::user()->id)->where('id_soal', $request->idS)->get();
            if ($temp->isEmpty()){
                $answer = jawaban::create([
                    'id_user' => Auth::user()->id,
                    'id_soal' => $request->idS,
                    'id_jawaban' => $request->idP,
                ]);
            }else{
               $answer = jawaban::where('id_user', Auth::user()->id)->where('id_soal', $request->idS)->update([
                   'id_jawaban' => $request->idP,
               ]);
            }
        } catch (\Exception $err){
            return response()->json($err);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data is Saved',
        ]);
    }
    public function add(){
        return view('admin.addkuisioner');
    }
    public function save(Request $request){
        $temp = DB::table('soals')->insertGetId([
           'name' => $request->soal,
           'created_by' => Auth::user()->id,
        ]);
        if($temp != null){
          foreach ($request->opsi as $o){
              if($o != null){
                  DB::table('pilgans')->insert([
                      'id_soal' => $temp,
                      'name' => $o,
                  ]);
              }
          }
        }
        return redirect('/admin/kuesioner');
    }
    public function update($id){
        $soal = DB::table('soals')->where('id', $id)->first();
        $pilgan = DB::table('pilgans')->where('id_soal', $id)->get();

        return view('admin.updatekuisioner', compact('soal', 'pilgan'));
    }
    public function saveupdate(Request $request){
        try {
            $soal = DB::table('soals')->where('id', $request->idSoal)->update([
               'name' => $request->soal,
            ]);
            $max = count($request->idPil);
            $x = 0;
            while ($x < $max){
                $pilgan = DB::table('pilgans')->where('id', $request->idPil[$x])->update([
                   'name' => $request->opsi[$x],
                ]);
                $x++;
            }

        } catch (\Exception $err){
            return response()->json($err);
        }
        return redirect('/admin/kuesioner');
    }

    public function delete($id){
        $soal = DB::table('soals')->where('id', $id)->first();
        $pilgan = DB::table('pilgans')->where('id_soal', $id)->get();

        return view('admin.deletekuisioner', compact('soal', 'pilgan'));
    }
    public function destory(Request $request){
        DB::table('soals')->where('id', $request->id)->delete();
        return redirect('/admin/kuesioner');
    }
}
