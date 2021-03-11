@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">User</a></li>
            <li class="breadcrumb-item active">Data User</li>
        </ol>
        </div><!-- /.col -->
    </div>
   
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header"> 
                    <h4 class="card-title">
                        User
                    </h4>
                    <div class="card-tools">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-plus"></i> Tambah</a>
                        
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead >
                            <tr >
                                <th>NO</th>
                                <th>WAKTU DIBUAT</th>
                                <th>NAMA</th>
                                <th>EMAIL</th>
                                <th>JABATAN</th>
                                <th>AKSI</th>
                            </tr>
                            
                            
                        </thead>
                        <tbody >
                            
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/plugins/datatables/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        var table = $('#datatable').DataTable({     
            responsive:false,   
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            ajax: {
                'url': '{{ route("datatable.user") }}',
                'type': 'GET',
                'beforeSend': function (request) {
                    request.setRequestHeader("X-CSRFToken", '{{ csrf_token() }}');
                }
            },
            columns: [
                {data: 'id', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }, searchable: false, orderable: false},
                {data:'created_at',name:'created_at'},
                {data:'nama',name:'nama'},
                {data:'email',name:'email'},
                {data:'jabatan',name:'jabatan'},
                {data:'action',name:'action' , searchable: false},
                
            ],
        });
    </script>
@endpush