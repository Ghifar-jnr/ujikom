<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Reimbursement;
use Illuminate\Http\Request;

class ReimbursementController extends Controller
{
    public function index()
    {
        $reimbursements = Reimbursement::with('karyawan')
            ->orderBy('id', 'desc')
            ->get();

        $totalTransaksi = Reimbursement::count();

        return view('transaksi.index', compact(
            'reimbursements',
            'totalTransaksi'
        ));
    }

    public function create()
    {
        $karyawans = Karyawan::orderBy('nama')->get();

        return view('transaksi.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        $validated['status'] = 'Disetujui';

        Reimbursement::create($validated);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Pengajuan reimbursement berhasil ditambahkan.');
    }
    public function edit(Reimbursement $reimbursement)
    {
        $karyawans = Karyawan::orderBy('nama')->get();

        return view('transaksi.edit', compact(
            'reimbursement',
            'karyawans'
        ));
    }

    public function update(Request $request, Reimbursement $reimbursement)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
        ]);

        $validated['status'] = 'Disetujui';

        $reimbursement->update($validated);

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Reimbursement $reimbursement)
    {
        $reimbursement->delete();

        return redirect()
            ->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}