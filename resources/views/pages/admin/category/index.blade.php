@extends('layouts.admin')

@section('title')
    Kategori    
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
          <div class="container-fluid">
            <div class="dashboard-heading">
              <h2 class="dashboard-title">Kategori</h2>
              <p class="dashboard-subtitle">
              </p>
            </div>
            <div class="dashboard-content">
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('category.create')}}" class="btn btn-primary mb-3">
                                + Tambah Kategori
                            </a>
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- isi untuk table nya --}}
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection


@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing : true,
            serverSide : true,
            ordering   : true,
            ajax: {
                url: '{!! url()->current() !!}'
            },
            columns: [
                {   data: 'id',name: 'id' },
                {   data: 'name', name: 'name' },
                {   data: 'photo', name: 'photo' },
              
                {   
                    data: 'action', 
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        })
    </script>    
@endpush