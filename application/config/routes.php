<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/index';

// editor
$route['pengguna'] = 'pengguna_controller/index';
$route['pengguna/tambah'] = 'pengguna_controller/create';
$route['pengguna/simpan'] = 'pengguna_controller/store';
$route['pengguna/edit/(:num)'] = 'pengguna_controller/edit/$1';
$route['pengguna/update'] = 'pengguna_controller/update';
$route['pengguna/delete/(:num)'] ='pengguna_controller/delete/$1';

// transaksi
$route['transaksi'] = 'transaksi_controller/index';
$route['transaksi/tambah'] = 'transaksi_controller/create';
$route['transaksi/simpan'] = 'transaksi_controller/store';
$route['transaksi/edit/(:num)'] = 'transaksi_controller/edit/$1';
$route['transaksi/update'] = 'transaksi_controller/update';
$route['transaksi/delete/(:num)'] = 'transaksi_controller/delete/$1';

// data karyawan
$route['karyawan'] = 'karyawan_controller/index';
$route['karyawan/tambah'] = 'karyawan_controller/create';
$route['karyawan/simpan'] = 'karyawan_controller/store';
$route['karyawan/edit/(:num)'] = 'karyawan_controller/edit/$1';
$route['karyawan/update'] = 'karyawan_controller/update';
$route['karyawan/delete/(:num)'] = 'karyawan_controller/delete/$1';


// report pemasukan
$route['report-pemasukan'] = 'report_pemasukan/index';
$route['get-report-pemasukan'] = 'report_pemasukan/getreport';

// report pengeluaran
$route['report-pengeluaran'] = 'report_pengeluaran/index';
$route['get-report-pengeluaran'] = 'report_pengeluaran/getreport';

// report laba rugi
$route['report-laba-rugi'] = 'report_labarugi/index';
$route['get-report-laba-rugi'] = 'report_labarugi/getreport';

// buku besar
$route['buku-besar'] = 'report_bukubesar/index';
$route['get-buku-besar'] = 'report_bukubesar/getreport';

// neraca saldo
$route['neraca-saldo'] = 'report_neracasaldo/index';
$route['get-neraca-saldo'] = 'report_neracasaldo/getreport';

// Dashboard
$route['dashboard'] = 'app/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
