```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Karyawan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('master.update', $karyawan->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Karyawan</label>
            <input type="text" name="nama" id="nama"
                class="form-control"
                value="{{ old('nama', $karyawan->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan"
                class="form-control"
                value="{{ old('jabatan', $karyawan->jabatan) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email"
                class="form-control"
                value="{{ old('email', $karyawan->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" name="no_telp" id="no_telp"
                class="form-control"
                value="{{ old('no_telp', $karyawan->no_telp) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('master.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
```