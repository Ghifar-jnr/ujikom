
@extends('layouts.app')

@section('title', 'Tambah Karyawan')
@section('page-heading', 'Tambah Karyawan')

@section('content')
<div class="content-card">
    <h4 class="mb-4">Form Tambah Karyawan</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('master.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control"
                   value="{{ old('jabatan') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label">No. Telepon</label>
            <input type="text" name="no_telp" class="form-control"
                   value="{{ old('no_telp') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan
        </button>

        <a href="{{ route('master.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
