@extends('layouts.app')

@section('title', 'Kelola Kategori Size')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Default form</h4>
                <p class="card-description"> Basic form layout </p>
                <form method="POST" action="{{ route('updatePassword') }}"> @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <p class="form-control"> {{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Email</label>
                        <p class="form-control">{{ $user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="current_password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword1" name="new_password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword2">Confirm New Password</label>
                        <input type="password" class="form-control" id="exampleInputConfirmPassword2"
                            name="new_password_confirmation" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update Password</button>
                    <a href="javascript:void(0);" class="btn btn-dark" onclick="window.history.back();">Cancel</a>

                </form>
            </div>
        </div>
    </div>
@endsection
