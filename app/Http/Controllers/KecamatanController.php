<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use App\Http\Controllers\Controller;


class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.kecamatan.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Data Kecamatan',
        ];
        return view('admin.kecamatan.v_add', $data);
    }

    public function insert()
    {
        request()->validate([
            'kecamatan' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kecamatan.required' => 'Wajib Diisi!',
            'warna.required' => 'Wajib Diisi!',
            'geojson.required' => 'Wajib Diisi!',
        ]
    );

    $data = [
        'kecamatan' => Request()->kecamatan,
        'warna' => Request()->warna,
        'geojson' => Request()->geojson,
    ];

    $this->KecamatanModel->InsertData($data);
    return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_kecamatan)
    {
        {
            $data = [
                'title' => 'Edit Data Kecamatan',
                'kecamatan' => $this->KecamatanModel->DetailData($id_kecamatan),
            ];
            return view('admin.kecamatan.v_edit', $data);
        }
    }

    public function update($id_kecamatan)
    {
        request()->validate([
            'kecamatan' => 'required',
            'warna' => 'required',
            'geojson' => 'required',
        ],
        [
            'kecamatan.required' => 'Wajib Diisi!',
            'warna.required' => 'Wajib Diisi!',
            'geojson.required' => 'Wajib Diisi!',
        ]
    );

    $data = [
        'kecamatan' => Request()->kecamatan,
        'warna' => Request()->warna,
        'geojson' => Request()->geojson,
    ];

    $this->KecamatanModel->UpdateData($id_kecamatan, $data);
    return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil Di Update');
    }

    public function delete($id_kecamatan)
    {
        $this->KecamatanModel->DeleteData($id_kecamatan);
    return redirect()->route('kecamatan')->with('pesan', 'Data Berhasil Di Hapus');
    }
}
