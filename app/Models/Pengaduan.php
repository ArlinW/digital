<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'id_user',
        'lokasi',
        'keterangan',
        'isi_laporan',
        'foto',
        'status',
        'tanggal_lapor',
        'feedback',
    ];

    public $timestamps = true;

    protected $casts = [
        'tanggal_lapor' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
