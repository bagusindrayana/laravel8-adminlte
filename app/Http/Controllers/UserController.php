<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{   
    
    public function datatable(Request $request)
    {
        $user = User::query();

        $datatables = DataTables::of($user)
        ->addIndexColumn()
        ->editColumn('created_at',function($data){
            return $data->created_at->format('Y-m-d H:i:s');
        })
        ->addColumn('action', function ($data) {
            return view('admin.user.action',compact('data'));
        });

        return $datatables->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $groups = Group::orderBy('nama','ASC')->pluck('nama','id');
    
        return view('admin.user.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->cek_akses('User', 'Tambah')){
            return abort(401);
        }

        $this->validate($request,[
            'password'=>'required|min:5',
            'nama'=>'required',
            'email'=>'required'
        ]);


        $data = new User;
        $data->opd_id = $request->opd_id;
        $data->group_id = $request->group_id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->jabatan = $request->jabatan;
        $data->pekerjaan = $request->pekerjaan;
        $data->whoami = $request->sebagai;
       
        try {
            $data->save();

            return redirect()->route('admin.user.index')->with(['success'=>'Berhasil Menambah Data User : '.$data->nama]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')->with(['error'=>'Gagal Menambah Data User : '.$th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $groups = Group::orderBy('nama','ASC')->pluck('nama','id');
     
        return view('admin.user.edit',['data'=>$user],compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
           
            'nama'=>'required',
            'email'=>'required'
        ]);


        
        
       
        try {
            $user->update([
                'group_id'=>$request->group_id,
                'nama'=>$request->nama,
                'email'=>$request->email,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
                'jabatan'=>$request->jabatan,
                'pekerjaan'=>$request->pekerjaan
            ]);
            return redirect()->route('admin.user.index')->with(['success'=>'Berhasil Mengubah Data User : '.$user->nama]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')->with(['error'=>'Gagal Mengubah Data User : '.$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('admin.user.index')->with(['success'=>'Berhasil Menghapus Data User : '.$user->nama]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.user.index')->with(['error'=>'Gagal Menghapus Data User : '.$th->getMessage()]);
        }
    }
}
