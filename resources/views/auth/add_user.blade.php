@extends('layouts.app')

@section('title', 'Tambah Pengguna Baru')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Pengguna Baru</h4>
                <form class="forms-sample" action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control text-light" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control text-light" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control text-light" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control text-light" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control file-upload-info">
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('users') }}" class="btn btn-dark">Cancel</a> <!-- Perbaikan untuk Cancel button -->
                </form>
            </div>
        </div>
    </div>
@endsection
