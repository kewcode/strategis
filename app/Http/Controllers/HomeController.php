<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\User;
use App\Variable;
use App\Topsis;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users(Request $request)
    {
        $users = User::orderBy("id","DESC")->paginate(8);

        if ($request->ajax()) {
          $view = view('admin.userData',compact('users'))->render();
              return response()->json(['html'=>$view]);
          }
          
        return view('admin.users', compact('users'));
    }

    public function users_edit(Request $req,$id)
    {

        if(Auth::user()->id == $id || Auth::user()->id == 1){
          $req->validate([
              'name' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'email', 'max:255'],
              // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);
          $user = user::find($req->input('id'));
          $user->name  = $req->input('name');

          if($req->input('email')){
            $user->email = $req->input('email');
          }

          if($req->input('password')){
            $user->password = Hash::make($req->input('password'));
          }

          $user->save();

          return back()->with('success', 'Data Berhasil Di Edit');
        }else{
          return back()->with('error', 'Maaf Anda tidak Bisa mengedit User Ini');
        }

    }
    public function variable(Request $request)
    {
        $users = User::orderBy("id","DESC")->paginate(8);

        if ($request->ajax()) {
          $view = view('admin.userData',compact('users'))->render();
              return response()->json(['html'=>$view]);
          }
          
        return view('admin.variable', compact('users'));
    }

    public function topsis(Request $request)
    {
        $users = User::orderBy("id","DESC")->paginate(8);

        if ($request->ajax()) {
          $view = view('admin.userData',compact('users'))->render();
              return response()->json(['html'=>$view]);
          }
          
        return view('admin.topsis', compact('users'));
    }

    public function maps(){
      return Variable::where("active",1)->select("bujur","lintang","nama","kecamatan")->get();
    }


    public function tambahTopsis(Request $req){
      // dd($req);

      // 'nama','kepadatan_penduduk','lokasi','jenis_usaha_sama'
      $data = new Topsis;
      $data->nama = $req->nama;
      $data->kepadatan_penduduk = $req->kepadatan_penduduk;
      $data->aksebilitas = $req->aksebilitas;
      $data->lokasi = $req->lokasi;
      $data->jenis_usaha_sama = $req->jenis_usaha_sama;
      $data->save();

      return back()->with("success","berhasil ditambahkan");
    }
    public function hapusTopsis($id){
      Topsis::find($id)->delete();
      return "success";
    }

}
