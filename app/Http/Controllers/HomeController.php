<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Anggota;
use App\Buku;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        $sortby = "Sort By";

        if(Auth::user()->level == 'user')
        {
            $datas = Buku::get();

            return view('user.index', compact('transaksi', 'anggota', 'buku', 'datas', 'sortby'));
        } 
        else {
            $datas = Transaksi::where('status', 'pinjam')->get();
            return view('home', compact('transaksi', 'anggota', 'buku', 'datas', 'sortby'));
        }
    }

    public function show(Request $request)
    {
        $transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        if(Auth::user()->level == 'user')
        {
            switch ($request->sort)
            {
                case "tahunini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->where('anggota_id', Auth::user()->anggota->id)
                            ->whereYear('tgl_kembali', '=', date('Y'))
                            ->get();

                $sortby = "Sort By Kembali Tahun ini";
                break;
    
                case "bulanini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->where('anggota_id', Auth::user()->anggota->id)
                            ->whereMonth('tgl_kembali', '=', date('m'))
                            ->get();

                $sortby = "Sort By Kembali Bulan ini";
                break;
    
                case "hariini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->where('anggota_id', Auth::user()->anggota->id)
                            ->whereDay('tgl_kembali', '=', date('d'))
                            ->get();

                $sortby = "Sort By Kembali Hari ini";
                break;
    
                default:
                // Set a default sort option
                $datas = Transaksi::where('status', 'pinjam')
                        ->where('anggota_id', Auth::user()->anggota->id)
                        ->get();

                $sortby = "Sort By";
                break;
            }
        } 
        else {

                switch ($request->sort)
            {
                case "tahunini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->whereYear('tgl_kembali', '=', date('Y'))
                            ->get();

                $sortby = "Sort By Kembali Tahun ini";
                break;

                case "bulanini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->whereMonth('tgl_kembali', '=', date('m'))
                            ->get();

                $sortby = "Sort By Kembali bulan ini";
                break;

                case "hariini":
                // Grab your records accordingly
                $datas = Transaksi::where('status', 'pinjam')
                            ->whereDay('tgl_kembali', '=', date('d'))
                            ->get();

                $sortby = "Sort By Kembali Hari ini";
                break;

                default:
                // Set a default sort option
                $datas = Transaksi::where('status', 'pinjam')
                        ->get();

                $sortby = "Sort By";
                break;
            }
        }
        return view('home', compact('transaksi', 'anggota', 'buku', 'datas', 'sortby'));
    }

    public function deskripsi($id)
    {
        $transaksi = Transaksi::get();
        $anggota   = Anggota::get();
        $buku      = Buku::get();
        $sortby = "Sort By";

        $data = Buku::findOrFail($id);

        return view('user.deskripsi', compact('transaksi', 'anggota', 'buku', 'data', 'sortby'));
    }
}
