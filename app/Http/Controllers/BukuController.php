<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = Buku::get();
        return view('buku.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('buku.create');
    }

    /*public function format()
    {
        $data = [['judul' => null, 'isbn' => null, 'pengarang' => null, 'penerbit' => null, 'tahun_terbit' => null, 'jumlah_buku' => null, 'deskripsi' => null, 'lokasi' => 'rak1/rak2/rak3']];
            $fileName = 'format-buku';
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('buku', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }*/

    /*public function import(Request $request)
    {
        $this->validate($request, [
            'importBuku' => 'required'
        ]);

        if ($request->hasFile('importBuku')) {
            $path = $request->file('importBuku')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $a = collect($data);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'judul' => $value->judul, 
                            'isbn' => $value->isbn, 
                            'pengarang' => $value->pengarang, 
                            'penerbit' => $value->penerbit,
                            'tahun_terbit' => $value->tahun_terbit, 
                            'jumlah_buku' => $value->jumlah_buku, 
                            'deskripsi' => $value->deskripsi, 
                            'lokasi' => $value->lokasi,
                            'cover' => NULL];

                    Buku::create($insert[$key]);
                        
                    }
                  
            };
        }
        alert()->success('Berhasil.','Data telah diimport!');
        return back();
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = null;
        $file_buku = null;

        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string',
            'kode_buku' => 'required|string'
        ]);

        if($request->file('cover') || $request->file('file_buku')){
             
            
            if($request->file('cover')){
                $fileCover = $request->file('cover');
                $dt = Carbon::now();
                $fileNameCover = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$fileCover->extension();
                $fileCover->move("images/buku", $fileNameCover);
                $cover = $fileNameCover;
            } 

            if($request->file('file_buku')){
                $fileBook = $request->file('file_buku');
                $fileNameBook = time().'.'.$fileBook->extension();
                $fileBook->move(public_path('uploads'), $fileNameBook);
                $file_buku = $fileNameBook;
            }
        }

        Buku::create([
                'judul' => $request->get('judul'),
                'isbn' => $request->get('isbn'),
                'kode_buku' => $request->get('kode_buku'),
                'no_panggil' => $request->get('no_panggil'),
                'pengarang' => $request->get('pengarang'),
                'edisi' => $request->get('edisi'),
                'penerbit' => $request->get('penerbit'),
                'kota_terbit' => $request->get('kota_terbit'),
                'tahun_terbit' => $request->get('tahun_terbit'),
                'kolasi' => $request->get('kolasi'),
                'sumber_buku' => $request->get('sumber_buku'),
                'jumlah_buku' => $request->get('jumlah_buku'),
                'lokasi' => $request->get('lokasi'),
                'kata_kunci' => $request->get('kata_kunci'),
                'ringkasan' => $request->get('ringkasan'),
                'daftar_isi' => $request->get('daftar_isi'),
                'status_pinjam' => $request->get('status_pinjam'),
                'cover' => $cover,
                'kondisi' => $request->get('kondisi'),
                'tingkat_kelas' => $request->get('tingkat_kelas'),
                'kategori' => $request->get('kategori'),
                'harga_buku' => $request->get('harga_buku'),
                'tingkat_kelas' => $request->get('tingkat_kelas'),
                'file_buku' => $file_buku,
            ]);

        alert::success('Berhasil.','Data telah ditambahkan!');

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }*/

        $data = Buku::findOrFail($id);

        return view('buku.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $data = Buku::findOrFail($id);
        return view('buku.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('cover') || $request->file('file_buku')){
            
            if($request->file('cover')) {
                $file = $request->file('cover');
                $dt = Carbon::now();
                $acak  = $file->getClientOriginalExtension();
                $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
                $request->file('cover')->move("images/buku", $fileName);
                $cover = $fileName;

                Buku::find($id)->update([
                    'judul' => $request->get('judul'),
                    'isbn' => $request->get('isbn'),
                    'kode_buku' => $request->get('kode_buku'),
                    'no_panggil' => $request->get('no_panggil'),
                    'pengarang' => $request->get('pengarang'),
                    'edisi' => $request->get('edisi'),
                    'penerbit' => $request->get('penerbit'),
                    'kota_terbit' => $request->get('kota_terbit'),
                    'tahun_terbit' => $request->get('tahun_terbit'),
                    'kolasi' => $request->get('kolasi'),
                    'sumber_buku' => $request->get('sumber_buku'),
                    'jumlah_buku' => $request->get('jumlah_buku'),
                    'lokasi' => $request->get('lokasi'),
                    'kata_kunci' => $request->get('kata_kunci'),
                    'ringkasan' => $request->get('ringkasan'),
                    'daftar_isi' => $request->get('daftar_isi'),
                    'status_pinjam' => $request->get('status_pinjam'),
                    'cover' => $cover,
                    'kondisi' => $request->get('kondisi'),
                    'tingkat_kelas' => $request->get('tingkat_kelas'),
                    'kategori' => $request->get('kategori'),
                    'harga_buku' => $request->get('harga_buku'),
                    'tingkat_kelas' => $request->get('tingkat_kelas'),
                    ]);
            }

            if($request->file('file_buku')) {
                $fileBook = $request->file('file_buku');
                $fileNameBook = time().'.'.$fileBook->extension();
                $fileBook->move(public_path('uploads'), $fileNameBook);
                $file_buku = $fileNameBook;

                Buku::find($id)->update([
                    'judul' => $request->get('judul'),
                    'isbn' => $request->get('isbn'),
                    'kode_buku' => $request->get('kode_buku'),
                    'no_panggil' => $request->get('no_panggil'),
                    'pengarang' => $request->get('pengarang'),
                    'edisi' => $request->get('edisi'),
                    'penerbit' => $request->get('penerbit'),
                    'kota_terbit' => $request->get('kota_terbit'),
                    'tahun_terbit' => $request->get('tahun_terbit'),
                    'kolasi' => $request->get('kolasi'),
                    'sumber_buku' => $request->get('sumber_buku'),
                    'jumlah_buku' => $request->get('jumlah_buku'),
                    'lokasi' => $request->get('lokasi'),
                    'kata_kunci' => $request->get('kata_kunci'),
                    'ringkasan' => $request->get('ringkasan'),
                    'daftar_isi' => $request->get('daftar_isi'),
                    'status_pinjam' => $request->get('status_pinjam'),
                    'kondisi' => $request->get('kondisi'),
                    'tingkat_kelas' => $request->get('tingkat_kelas'),
                    'kategori' => $request->get('kategori'),
                    'harga_buku' => $request->get('harga_buku'),
                    'file_buku' => $file_buku,
                    ]);
            }
        }else {
            Buku::find($id)->update([
                'judul' => $request->get('judul'),
                'isbn' => $request->get('isbn'),
                'kode_buku' => $request->get('kode_buku'),
                'no_panggil' => $request->get('no_panggil'),
                'pengarang' => $request->get('pengarang'),
                'edisi' => $request->get('edisi'),
                'penerbit' => $request->get('penerbit'),
                'kota_terbit' => $request->get('kota_terbit'),
                'tahun_terbit' => $request->get('tahun_terbit'),
                'kolasi' => $request->get('kolasi'),
                'sumber_buku' => $request->get('sumber_buku'),
                'jumlah_buku' => $request->get('jumlah_buku'),
                'lokasi' => $request->get('lokasi'),
                'kata_kunci' => $request->get('kata_kunci'),
                'ringkasan' => $request->get('ringkasan'),
                'daftar_isi' => $request->get('daftar_isi'),
                'status_pinjam' => $request->get('status_pinjam'),
                'cover' => $cover,
                'kondisi' => $request->get('kondisi'),
                'tingkat_kelas' => $request->get('tingkat_kelas'),
                'kategori' => $request->get('kategori'),
                'harga_buku' => $request->get('harga_buku'),
                'file_buku' => $file_buku,
                ]);
        }

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('buku.index');
    }
}
