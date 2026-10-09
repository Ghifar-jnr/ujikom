
@extends('layouts.app')

@section('title', 'Master Karyawan')
@section('page-heading', 'Master Karyawan')

@section('content')
<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Data Karyawan</h4>
            <p class="text-muted mb-0">
                Kelola data karyawan perusahaan.
            </p>
        </div>

        <a href="{{ route('master.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Karyawan
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($karyawans as $karyawan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->jabatan }}</td>
                        <td>{{ $karyawan->email }}</td>
                        <td>{{ $karyawan->no_telp }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('master.edit', $karyawan->id) }}"
                            class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('master.destroy', $karyawan->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus data karyawan ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data karyawan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="alert alert-primary mt-3 mb-0">
        <i class="fas fa-users me-2"></i>
        Total Karyawan: <strong>{{ $totalKaryawan }}</strong>
    </div>

</div>
@endsection
