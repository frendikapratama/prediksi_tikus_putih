@extends('layouts.app')

@section('title', 'Kelola Data Tikus')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Tikus</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-icon-text"
                        onclick="window.location.href='{{ route('tikus.create') }}'">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i> Add Data Tikus
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Jenis </th>
                                <th> Kateogori size </th>
                                <th> Banyak Tikus </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataTikus as $key => $item)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td> {{ $item->jenis->name }} </td>
                                    <td>
                                        {{ $item->kategoriSize->name }}
                                    </td>
                                    <td> {{ $item->banyak }} </td>
                                    <td> <a href="{{ route('tikus.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="mdi mdi-border-color"></i></a>
                                        <form action="{{ route('tikus.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> <i
                                                    class="mdi mdi-delete-variant"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
