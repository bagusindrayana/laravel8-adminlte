@extends('admin.layouts.app')

@section('title')
    Tambah Group
@endsection

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Tambah Group</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.group.index') }}">Group</a></li>
            <li class="breadcrumb-item active">Tambah Group</li>
        </ol>
        </div><!-- /.col -->
    </div>
   
@endsection



@section('content')
    
        
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.group.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-default">
                        <div class="card-header"> 
                            <h3 class="card-title">Data Group</h3>
                            <div class="card-tools">
                                <div class="input-group ">
                                    <a href="{{ route('admin.group.index') }}" class="btn btn-sm btn-warning text-white "><i class="fa fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-check"></i> Kirim</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    @include('admin.group.form')
                                </div>
                            </div>
                            
                        
                            
                            
                        </div>

                        <div class="card-footer">
                            <div class="input-group ">
                                <a href="{{ route('admin.group.index') }}" class="btn btn-sm btn-warning text-white "><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-sm btn-success ml-2"><i class="fa fa-check"></i> Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

