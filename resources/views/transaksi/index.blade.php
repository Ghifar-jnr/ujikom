@extends('layouts.app')

@section('title', 'Data Reimbursement')
@section('page-heading', 'Data Reimbursement')

@section('content')
<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Data Reimbursement</h4>
            <p class="text-muted mb-0">
                Kelola data pengajuan reimbursement karyawan.
            </p>
        </div>

        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Pengajuan
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
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reimbursements as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->karyawan->nama ?? '-' }}</td>
                        <td>
                            {{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}
                        </td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            Rp {{ number_format((float) $item->jumlah, 0, ',', '.') }}
                        </td>
                        <td>{{ $item->status }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('transaksi.edit', $item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('transaksi.destroy', $item->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
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
                        <td colspan="7" class="text-center text-muted py-4">
                            Belum ada pengajuan reimbursement.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="alert alert-primary mt-3 mb-0">
        <i class="fas fa-receipt me-2"></i>
        Total Transaksi: <strong>{{ $totalTransaksi }}</strong>
    </div>

</div>
@endsection