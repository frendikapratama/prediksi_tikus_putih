@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pakan</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('pakan.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Tambah Data Pakan
                    </button>
                </div>
                <div class="table-responsive">
                    <h1>reproduksi</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
