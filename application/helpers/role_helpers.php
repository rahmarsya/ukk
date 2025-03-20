<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_access($required_role)
{
    $CI = &get_instance();

    // Ambil role dari session
    $user_role = $CI->session->userdata('role');

    // Jika belum login, arahkan ke login
    if (!$CI->session->userdata('logged_in')) {
        redirect('auth');
    }

    // Daftar hak akses untuk setiap role
    $role_permissions = [
        'admin' => ['admin', 'autor', 'user', 'anonim'],
        'autor' => ['autor', 'user', 'anonim'],
        'user'  => ['user', 'anonim'],
        'anonim' => ['anonim']
    ];

    // Cek apakah user memiliki izin akses
    if (!isset($role_permissions[$required_role]) || !in_array($user_role, $role_permissions[$required_role])) {
        show_error('Anda tidak memiliki akses ke halaman ini.', 403, 'Akses Ditolak');
    }
}
