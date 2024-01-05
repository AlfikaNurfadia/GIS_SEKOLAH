<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\WebModel;

class WebController extends Controller
{
    public function __construct() {
        $this->WebModel = new WebModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Pemetaan',
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'kategori' => $this->WebModel->DataKategori(),
        ];
        return view('layouts.v_web', $data);
    }

    public function kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
        $data = [
            'title' => 'Kecamatan '.$kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $this->WebModel->DataSekolah($id_kecamatan),
            'kategori' => $this->WebModel->DataKategori(),
            'kec' => $kec,
        ];
        return view('layouts.v_kecamatan', $data);
    }

    public function kategori($id_kategori)
    {
        $kate = $this->WebModel->DetailKategori($id_kategori);
        $data = [
            'title' => 'Kategori ' . $kate->kategori,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $this->WebModel->DataSekolahKategori($id_kategori),
            'kategori' => $this->WebModel->DataKategori(),
        ];
        return view('layouts.v_kategori', $data);

        // if ($kate !== null) {
        //     $data = [
        //         'title' => 'Kategori ' . $kate->kategori,
        //         'kecamatan' => $this->WebModel->DataKecamatan(),
        //         'sekolah' => $this->WebModel->DataSekolahKategori($id_kategori),
        //         'kategori' => $this->WebModel->DataKategori(),
        //     ];
        //     return view('layouts.v_kategori', $data);
        // } else {
        //     // Data kategori tidak ditemukan, mungkin tampilkan pesan error atau redirect
        //     return redirect()->route('home')->with('error', 'Kategori tidak ditemukan');
        // }
        
    }
    
    public function detailsekolah($id_sekolah)
    {
        $sekolah = $this->WebModel->DetailDataSekolah($id_sekolah);
        $data = [
            'title' => 'Detail ',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'kategori' => $this->WebModel->DataKategori(),
            'sekolah' => $sekolah,
        ];
        return view('layouts.v_detailsekolah', $data);
    }

    public function semuadatasekolah()
    {
        $data = [
            'title' => 'Data Sekolah',
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'kategori' => $this->WebModel->DataKategori(),
        ];
        return view('layouts.v_semuasekolah', $data);
    }
}
