<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->KategoriModel->AllData(),
        ];
        return view('admin.kategori.v_index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Kategori',
        ];
        return view('admin.kategori.v_add', $data);
    }

    public function insert()
    {
        request()->validate([
            'nama_kategori' => 'required',
        ],
        [
            'nama_kategori.required' => 'Wajib Diisi!',
        ],
    );
    $data = [
        'nama_kategori' => Request()->nama_kategori,
    ];

    $this->KategoriModel->InsertData($data);
    return redirect()->route('kategori')->with('pesan', 'Data Berhasil Di Tambahkan'); 
    }   

    public function edit($id_kategori)
    {
        {
            $data = [
                'title' => 'Edit Data Kategori ',
                'kategori' => $this->KategoriModel->DetailData($id_kategori),
            ];
            return view('admin.kategori.v_edit', $data);
        }
    }

    public function update($id_kategori)
    {
        request()->validate([
            'nama_kategori' => 'required',
        ],
        [
            'nama_kategori.required' => 'Wajib Diisi!',
        ]
    );

    $data = [
        'nama_kategori' => Request()->nama_kategori,
    ];

    $this->KategoriModel->UpdateData($id_kategori, $data);
    return redirect()->route('kategori')->with('pesan', 'Data Berhasil Di Update');
    }

    public function delete($id_kategori)
    {
        $this->KategoriModel->DeleteData($id_kategori);
    return redirect()->route('kategori')->with('pesan', 'Data Berhasil Di Hapus');
    }
}
