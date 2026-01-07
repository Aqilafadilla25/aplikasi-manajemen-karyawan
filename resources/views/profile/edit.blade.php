@extends('layouts.app')
@section('title', 'Profile Saya')

@section('content')
<div class="container">

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Profile</h5>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 text-center">
                    <img src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('assets/img/default-user.png') }}"
                         class="rounded-circle mb-2" width="120">
                </div>

                <div class="mb-3">
                    <label>Foto Profile</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>

                <button class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
