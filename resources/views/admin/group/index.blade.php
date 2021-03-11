@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Data Group</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.group.index') }}">Group</a></li>
            <li class="breadcrumb-item active">Data Group</li>
        </ol>
        </div><!-- /.col -->
    </div>
   
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Group</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.group.create') }}" class="btn btn-sm btn-primary text-white"><i class="fa fa-plus"></i> Tambah</a>
                        
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead >
                            <tr >
                                <th>NO</th>
                                <th>WAKTU DIBUAT</th>
                                <th>NAMA</th>
                                <th>AKSI</th>
                            </tr>
                            
                            
                        </thead>
                        <tbody >
                            
                            
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
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
                'url': '{{ route("datatable.group") }}',
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
                {data:'action',name:'action' , searchable: false},
                
            ],
        });
    </script>
@endpush