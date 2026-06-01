<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TargetAkademik extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'target_akademik';

    /**
     * Atribut yang boleh diisi secara massal (mass assignment).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'target_ipk',
        'target_nilai',
    ];

    /**
     * Cast atribut ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'target_ipk' => 'decimal:2',
    ];

    /**
     * Relasi: TargetAkademik dimiliki oleh seorang User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
