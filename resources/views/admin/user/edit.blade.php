@extends('admin.layouts.app')

@section('title')
    Ubah User
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Ubah User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
            <li class="breadcrumb-item active">Ubah User</li>
        </ol>
        </div><!-- /.col -->
    </div>
   
@endsection




@section('content')
    <form action="{{ route('admin.user.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header"> 
                        <h4 class="card-title">Ubah User</h4>
                        <div class="card-tools">
                            <div class="input-group ">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-warning text-white "><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-check"></i> Simpan</button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.user.form',['data'=>$data])
                            </div>
                        </div>
                        
                       
                        
                        
                    </div>

                    <div class="card-footer">
                        <div class="input-group ">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-warning text-white "><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        
    </form>
@endsection

