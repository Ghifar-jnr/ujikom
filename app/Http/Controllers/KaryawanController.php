<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::orderBy('id', 'asc')->get();
        $totalKaryawan = Karyawan::count();

        return view('master.index', compact(
            'karyawans',
            'totalKaryawan'
        ));
    }

    public function create()
    {
        return view('master.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        Karyawan::create($validated);

        return redirect()
            ->route('master.index')
            ->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit(Karyawan $master)
    {
        return view('master.edit', [
            'karyawan' => $master,
        ]);
    }

    public function update(Request $request, Karyawan $master)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
        ]);

        $master->update($validated);

        return redirect()
            ->route('master.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $master)
    {
        $master->delete();

        return redirect()
            ->route('master.index')
            ->with('success', 'Data karyawan berhasil dihapus.');
    }
}
