<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reimbursement extends Model
{
    protected $table = 'reimbursements';

    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'keterangan',
        'jumlah',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class);
    }
}