<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); 
// Route untuk halaman utama (home page), method GET

// ========== AUTH (Login, Register, Logout) ==========
$routes->get('/login', 'Auth::login');    
// Menampilkan halaman login (GET)
$routes->post('/login', 'Auth::login');   
// Memproses data login dari form (POST)

$routes->get('/register', 'Auth::register'); 
// Menampilkan halaman register (GET)
$routes->post('/register', 'Auth::register'); 
// Memproses data pendaftaran dari form (POST)

$routes->get('/logout', 'Auth::logout');  
// Logout user dan redirect (biasanya ke login/home)

// ========== TUGAS ==========
$routes->get('/tugas', 'Tugas::index');  
// Menampilkan daftar semua tugas (GET)

$routes->get('/tugas/tambah', 'Tugas::tambah'); 
// Menampilkan form tambah tugas (GET)
$routes->post('/tugas/tambah', 'Tugas::tambah'); 
// Memproses data tugas baru yang dikirim dari form (POST)

$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); 
// Menampilkan form edit tugas berdasarkan ID (GET)
// (:num) berarti hanya menerima parameter angka (misal: /tugas/edit/3)

$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); 
// Memproses update tugas berdasarkan ID (POST)

$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); 
// Menghapus tugas berdasarkan ID (GET, bisa dipertimbangkan jadi POST/DELETE untuk keamanan)
