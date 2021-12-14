<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        return view('admin.index');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function coba()
    {
        return view('articles.jajal');
    }
    public function pengajuan()
    {
        return view('admin.pameran.pengajuan');
    }
    public function publikasi()
    {
        return view('admin.pameran.publikasi');
    } 
    public function berlangsung()
    {
        return view('admin.pameran.berlangsung');
    }
    public function selesai()
    {
        return view('admin.pameran.selesai');
    }
    public function tersedia()
    {
        return view('admin.karya.tersedia');
    }
    public function dikirim()
    {
        return view('admin.karya.dikirim');
    }
    public function finish()
    {
        return view('admin.karya.finish');
    }
    public function artikel()
    {
        return view('admin.artikel');
    }
    public function artikelcreate()
    {
        return view('admin.artikel-create');
    }
    public function pengguna()
    {
        return view('admin.pengguna');
    }
    public function sedia()
    {
        return view('admin.lelang.sedia');
    }
    public function kirim()
    {
        return view('admin.lelang.kirim');
    }
    public function done()
    {
        return view('admin.lelang.done');
    }
    public function artikelubah()
    {
        return view('admin.artikel-ubah');
    }
    public function karyapameran()
    {
        return view('admin.pameran.karya-pameran');
    }
    public function detailpublikasi()
    {
        return view('admin.pameran.detail-publikasi');
    }
    public function tiketpameran()
    {
        return view('admin.pameran.tiket-pameran');
    }
}
