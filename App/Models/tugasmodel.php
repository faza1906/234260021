<?php

// app/Models/TugasModel.php
namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model {
    // Nama tabel di database yang digunakan oleh model ini
    protected $table = 'tugas';

    // Kolom-kolom yang diizinkan untuk diisi secara massal (safe to insert/update)
    protected $allowedFields = [
        'judul',       // Judul tugas
        'deskripsi',   // Deskripsi tugas
        'deadline',    // Deadline tugas
        'status',      // Status tugas (misal: selesai/belum)
        'user_id'      // ID user yang punya tugas
    ];

    // Tidak menggunakan fitur created_at & updated_at otomatis
    protected $useTimestamps = false;
}
