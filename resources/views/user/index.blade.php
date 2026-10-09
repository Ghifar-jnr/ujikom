
@extends('layouts.app')

@section('title', 'User')
@section('page-heading', 'Welcome')

@section('content')
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Data User</h4>
                <p class="text-muted mb-0">
                    Daftar pengguna yang terdaftar di aplikasi.
                </p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 80px;">No</th>
                        <th>User</th>
                        <th>Password</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>{{ $user->username ?? '-' }}</td>
                            <td>{{ $user->password_asli ?? 'Belum tersedia' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada data user.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <div class="alert alert-primary mb-0">
                <i class="fas fa-users me-2"></i>
                Total User:
                <strong>{{ $totalUsers }}</strong>
            </div>
        </div>
    </div>
@endsection
