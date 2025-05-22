<?php

// app/Models/UserModel.php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    // Nama tabel di database yang digunakan oleh model ini
    protected $table = 'users';

    // Kolom-kolom yang diizinkan untuk diisi secara massal (misal pakai ->save() atau ->insert())
    protected $allowedFields = ['username', 'password'];

    // Tidak menggunakan kolom timestamps (created_at & updated_at)
    protected $useTimestamps = false;
}
