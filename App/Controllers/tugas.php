<?php

// app/Controllers/Tugas.php
namespace App\Controllers;

use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {

    // Fungsi untuk menampilkan semua tugas milik user yang sedang login
    public function index() {
        $model = new TugasModel();

        // Ambil semua tugas berdasarkan user_id dari session
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();

        // Tampilkan ke view tugas/index
        return view('tugas/index', $data);
    }

    // Fungsi untuk menambah tugas baru
    public function tambah() {
        if ($this->request->getMethod() === 'post') {
            // Kalau form dikirim (POST), simpan data tugas baru
            $model = new TugasModel();
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'), // Simpan user_id dari session
            ]);

            // Redirect balik ke halaman daftar tugas
            return redirect()->to('/tugas');
        }

        // Kalau bukan POST, tampilkan form tambah tugas
        return view('tugas/tambah');
    }

    // Fungsi untuk edit tugas berdasarkan ID
    public function edit($id) {
        $model = new TugasModel();

        if ($this->request->getMethod() === 'post') {
            // Kalau form dikirim, update data tugas
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);

            // Redirect balik ke halaman daftar tugas
            return redirect()->to('/tugas');
        }

        // Kalau bukan POST, ambil data tugas berdasarkan ID untuk ditampilkan di form edit
        $data['tugas'] = $model->find($id);
        return view('tugas/edit', $data);
    }

    // Fungsi untuk menghapus tugas berdasarkan ID
    public function hapus($id) {
        $model = new TugasModel();

        // Hapus tugas berdasarkan ID
        $model->delete($id);

        // Redirect balik ke halaman daftar tugas
        return redirect()->to('/tugas');
    }
}
