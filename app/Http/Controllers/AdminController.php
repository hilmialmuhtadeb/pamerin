<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Artwork;
use App\Models\Exhibition;
use App\Models\User;
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
        return view('admin.pameran.pengajuan', [
            'exhibitions' => Exhibition::where('stages', '<', 3)->get(),
            'color' => ['', 'text-orange', 'text-success'],
            'text' => ['', 'Pengajuan', 'Telah Disetujui'],
        ]);
    }
    public function publikasi()
    {
        $exhibitions = Exhibition::where('stages', 3)->get();
        return view('admin.pameran.publikasi', compact('exhibitions'));
    } 
    public function berlangsung()
    {
        $exhibitions = Exhibition::where('date', date("Y-m-d"))->get();
        return view('admin.pameran.berlangsung', compact('exhibitions'));
    }
    public function selesai()
    {
        $exhibitions = Exhibition::where('date', '<', date("Y-m-d"))->get();
        return view('admin.pameran.selesai', [
            'exhibitions' => $exhibitions,
            'color' => ['primary', 'success'],
            'text' => ['Belum', 'Sudah'],
        ]);
    }
    public function tersedia()
    {
        $artworks = Artwork::get();
        return view('admin.karya.tersedia', [
            'artworks' => $artworks,
            'color' => ['grey', 'orange', 'danger', 'success', 'primary'],
            'text' => ['Baru Ditambah', 'Dijual', 'Belum Bayar', 'Sudah Bayar', 'Terkonfirmasi'],
        ]);
    }
    public function dikirim()
    {
        $artworks = Artwork::where('isReady', 2)->get();
        return view('admin.karya.dikirim', compact('artworks'));
    }
    public function finish()
    {
        $artworks = Artwork::where('isReady', 3)->get();
        return view('admin.karya.finish', [
            'artworks' => $artworks,
            'color' => ['primary', 'success'],
            'text' => ['Belum', 'Sudah'],
        ]);
    }
    public function artikel()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.artikel', compact('articles'));
    }
    public function artikelcreate()
    {
        return view('admin.artikel-create');
    }
    public function pengguna()
    {
        return view('admin.pengguna', [
            'users' => User::orderBy('type')->get(),
            'admins' => User::where('type', 1)->get(),
            'artists' => User::where('type', 2)->get(),
            'guests' => User::where('type', 3)->get(),
            'role' => ['Admin', 'Seniman', 'Pengunjung'],
            'color' => ['text-warning', 'text-guava', 'text-navy'],
            'modal' => ['info-admin', 'edit-seniman', 'edit-pengunjung'],
        ]);
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
    public function artikelubah(Article $article)
    {
        return view('admin.artikel-ubah', compact('article'));
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
