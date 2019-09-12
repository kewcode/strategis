<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Variable;
use DB;
use Yajra\Datatables\Datatables;
class VariableController extends Controller
{
    public function v(){
        return view("admin.variable.crud");
    }

    public function data_v()
    {
        return Datatables::of(Variable::query())->make(true);
    }

    public function tambah_v(Request $d){
        $new = new Variable;
        $new->alamat = $d->alamat;
        $new->kabupaten_kota =  "Kota Banjar";
        $new->kecamatan =  $d->kecamatan;
        $new->lintang =  $d->lintang;
        $new->bujur =  $d->bujur;
        $new->nama =  $d->nama;
        $new->jumlah =  $d->jumlah;
        $new->kategori =  $d->kategori;
        $new->save();
        return back()->with("success","Data Berhasil Ditambahkan");
    }
    public function edit_v(Request $d){
        $new = Variable::find($d->id);
        $new->alamat = $d->alamat;
        $new->kabupaten_kota =  "Kota Banjar";
        $new->kecamatan =  $d->kecamatan;
        $new->lintang =  $d->lintang;
        $new->bujur =  $d->bujur;
        $new->nama =  $d->nama;
        $new->jumlah =  $d->jumlah;
        $new->kategori =  $d->kategori;
        $new->update();
        return back()->with("success","Data Berhasil Diedit");
    }
    public function hapus_v($id){
        $new = Variable::find($id);
        $new->delete();
        return back()->with("success","Data Berhasil Dihapus");
    }
    public function active_v($id){
        $new = variable::find($id);
        if($new->active == 1){
            $new->active =  0;
        }else{
            $new->active =  1;
        }
        $new->update();
        return back()->with("success","Status Berhasil Diedit");
    }
    // Kantor
    public function kantor(){
        return view("admin.variable.kantor");
    }

    public function data_k()
    {
        return Datatables::of(variable::query())->make(true);
    }
    // Jalan
}
