```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaksi Reimbursement</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transaksi.update', $reimbursement->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="karyawan_id" class="form-label">
                Nama Karyawan
            </label>

            <select name="karyawan_id" id="karyawan_id"
                    class="form-select" required>
                @foreach ($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}"
                        {{ old('karyawan_id', $reimbursement->karyawan_id) == $karyawan->id ? 'selected' : '' }}>
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
                   value="{{ old('tanggal', $reimbursement->tanggal->format('Y-m-d')) }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">
                Keterangan
            </label>

            <textarea name="keterangan" id="keterangan"
                      class="form-control" rows="3"
                      maxlength="255" required>{{ old('keterangan', $reimbursement->keterangan) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">
                Jumlah Reimbursement (Rp)
            </label>

            <input type="number" name="jumlah" id="jumlah"
                   class="form-control" min="0.01" step="0.01"
                   value="{{ old('jumlah', $reimbursement->jumlah) }}"
                   required>
        </div>

        <p>Status: <strong>Disetujui</strong></p>

        <button type="submit" class="btn btn-primary">
            Simpan Perubahan
        </button>

        <a href="{{ route('transaksi.index') }}"
           class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
```