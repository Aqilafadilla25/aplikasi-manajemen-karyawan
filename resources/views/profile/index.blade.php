@extends('layouts.app')
@section('title','Profile Saya')

@section('content')
<div class="container">

    <h4 class="mb-3">Profile Saya</h4>

    <div class="card">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="text-center mb-3">
                    <img
                        src="{{ $user->photo ? asset('storage/'.$user->photo) : asset('assets/img/avatars/1.png') }}"
                        class="rounded-circle"
                        width="120"
                        height="120"
                        style="object-fit:cover">
                </div>

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label>Foto Profile</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button class="btn btn-primary">
                    Simpan Perubahan
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
