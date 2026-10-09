@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengajuan Reimbursement</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="karyawan_id" class="form-label">
                Nama Karyawan
            </label>

            <select name="karyawan_id" id="karyawan_id"
                    class="form-select" required>
                <option value="">-- Pilih Karyawan --</option>

                @foreach ($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}"
                        {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>
                        {{ $karyawan->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">
                Tanggal Pengeluaran
            </label>
            <input type="date" name="tanggal" id="tanggal"
                   class="form-control"
                   value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">
                Keterangan Pengeluaran
            </label>
            <textarea name="keterangan" id="keterangan"
                      class="form-control" rows="3"
                      maxlength="255" required>{{ old('keterangan') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">
                Jumlah Reimbursement (Rp)
            </label>
            <input type="number" name="jumlah" id="jumlah"
                   class="form-control" min="0.01" step="0.01"
                   value="{{ old('jumlah') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Pengajuan
        </button>

        <a href="{{ route('transaksi.index') }}"
        class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection