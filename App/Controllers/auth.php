<?php

// app/Controllers/Auth.php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {

    // Fungsi untuk login user
    public function login() {
        helper(['form']); // Load helper form untuk bantu ambil data dari form

        if ($this->request->getMethod() === 'post') {
            // Kalau request-nya POST, berarti user ngirim form login
            $model = new UserModel();

            // Cari user berdasarkan username
            $user = $model->where('username', $this->request->getPost('username'))->first();

            // Cek user ditemukan dan password cocok
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Set session user setelah login berhasil
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);

                // Redirect ke halaman tugas
                return redirect()->to('/tugas');
            }

            // Kalau login gagal, balik ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Login gagal');
        }

        // Kalau bukan POST, tampilkan halaman login
        return view('auth/login');
    }

    // Fungsi untuk register user baru
    public function register() {
        helper(['form']); // Load helper form

        if ($this->request->getMethod() === 'post') {
            // Ambil data dari form register
            $model = new UserModel();
            $data = [
                'username' => $this->request->getPost('username'),
                // Enkripsi password sebelum disimpan ke database
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            // Simpan user baru ke database
            $model->insert($data);

            // Setelah berhasil daftar, redirect ke login
            return redirect()->to('/login');
        }

        // Kalau bukan POST, tampilkan halaman register
        return view('auth/register');
    }

    // Fungsi untuk logout user
    public function logout() {
        // Hapus semua data session (logout)
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
