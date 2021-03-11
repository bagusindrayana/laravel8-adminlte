<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GroupController extends Controller
{
    public function datatable(Request $request)
    {
        $group = Group::query();

        $datatables = DataTables::of($group)
        ->addIndexColumn()
        ->editColumn('created_at',function($data){
            return $data->created_at->format('Y-m-d H:i:s');
        })
        ->addColumn('action', function ($data) {
            return view('admin.group.action',compact('data'));
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
        return view('admin.group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(!Auth::user()->cek_akses('Group','Tambah')){
            return abort(401);
        }
        $akses = Akses::orderBy('nama','ASC')->get();
        return view('admin.group.create',compact('akses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(!Auth::user()->cek_akses('Group','Tambah')){
            return abort(401);
        }
        $request->validate([
            'nama'=>'required'
        ]);

        try {
            $group = Group::create([
                'nama'=>$request->nama
            ]);

            $group->akses()->attach($request->akses);
          
            return redirect(route('admin.group.index'))->with(['success'=>'Berhasil Menambah Data Group : '.$group->nama]);
        } catch (\Throwable $th) {
            return redirect(route('admin.group.index'))->with(['error'=>'Gagal Menambah Data Group : '.$th->getMessage()]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {   
        if(!Auth::user()->cek_akses('Group','Ubah')){
            return abort(401);
        }
        $group_akses = $group->akses()->pluck('akses_id')->toArray();
        $akses = Akses::orderBy('nama','ASC')->get();
        return view('admin.group.edit',['data'=>$group,'group_akses'=>$group_akses,'akses'=>$akses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {   
        if(!Auth::user()->cek_akses('Group','Ubah')){
            return abort(401);
        }
        $request->validate([
            'nama'=>'required'
        ]);

        try {
            $group->update([
                'nama'=>$request->nama
            ]);

            $group->akses()->sync($request->akses);
            //$group->opd()->sync($request->opd_id);

            return redirect(route('admin.group.index'))->with(['success'=>'Berhasil Mengubah Data Group : '.$group->nama]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'Gagal Mengubah Data Group : '.$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {   
        if(!Auth::user()->cek_akses('Group','Hapus')){
            return abort(401);
        }
        try {
            $group->delete();

            return redirect()->route('admin.user.index')->with(['success'=>'Berhasil Menghapus Data Group : '.$group->nama]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'Gagal Menghapus Data Group : '.$th->getMessage()]);
        }
    }
}
