<!-- resources/views/jenis/index.blade.php -->
@extends('layouts.app')

@section('title', 'Jenis Tikus')

@section('content')
    <h1>Jenis Tikus</h1>
    <a href="{{ route('jenis.create') }}" class="btn btn-primary mb-3">Add Jenis</a>

    <!-- Tabel Data Jenis -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jenis</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Jenis as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
