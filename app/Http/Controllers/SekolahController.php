<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;
use App\Models\KategoriModel;
use App\Models\KecamatanModel;

class SekolahController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->SekolahModel = new SekolahModel();
        $this->KategoriModel = new KategoriModel();
        $this->KecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Sekolah',
            'sekolah' => $this->SekolahModel->AllData(),
        ];
        return view('admin.sekolah.v_index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Sekolah',
            'kategori' => $this->KategoriModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];
        return view('admin.sekolah.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_sekolah' => 'required',
            'npsn_sekolah' => 'required',
            'id_kategori' => 'required',
            'status'  => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'deskripsi_sekolah' => 'required',
            'icon' => 'required|max:1024',
            'akreditasi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'rombel' => 'required',
            'jurusan' => 'required',
        ], [
            'nama_sekolah.required' => 'Wajib Diisi!',
            'npsn_sekolah.required' => 'Wajib Diisi!',
            'id_kategori.required' => 'Wajib Diisi!',
            'status.required' => 'Wajib Diisi!',
            'id_kecamatan.required' => 'Wajib Diisi!',
            'alamat.required' => 'Wajib Diisi!',
            'deskripsi_sekolah.required' => 'Wajib Diisi!',
            'icon.required' => 'Wajib Diisi!',
            'akreditasi' => 'Wajib Diisi!',
            'visi' => 'Wajib Diisi!',
            'misi' => 'Wajib Diisi!',
            'rombel' => 'Wajib Diisi!',
            'jurusan' => 'Wajib Diisi!',
        ]);

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon'),$filename);

        $data = [
            'nama_sekolah' => Request()->nama_sekolah,
            'npsn_sekolah' => Request()->npsn_sekolah,
            'id_kategori' => Request()->id_kategori,
            'status' => Request()->status,
            'id_kecamatan' => Request()->id_kecamatan,
            'alamat' => Request()->alamat,
            'posisi' => Request()->posisi,
            'deskripsi_sekolah' => Request()->deskripsi_sekolah,
            'icon' => $filename,
            'akreditasi' => Request()->akreditasi,
            'visi' => Request()->visi,
            'misi' => Request()->misi,
            'rombel' => Request()->rombel,
            'jurusan' => Request()->jurusan,
        ];
        $this->SekolahModel->InsertData($data);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Di Simpan');
    }

    public function edit($id_sekolah)
    {
        $data = [
            'title' => 'Sekolah',
            'kategori' => $this->KategoriModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'sekolah' => $this->SekolahModel->DetailData($id_sekolah)
        ];
        return view('admin.sekolah.v_edit', $data);
    }

    public function update($id_sekolah)
    {
        Request()->validate([
            'nama_sekolah' => 'required',
            'npsn_sekolah' => 'required',
            'id_kategori' => 'required',
            'status'  => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'deskripsi_sekolah' => 'required',
            'icon' => 'max:1024',
            'akreditasi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'rombel' => 'required',
            'jurusan' => 'required',
        ], [
            'nama_sekolah.required' => 'Wajib Diisi!',
            'npsn_sekolah.required' => 'Wajib Diisi!',
            'id_kategori.required' => 'Wajib Diisi!',
            'status.required' => 'Wajib Diisi!',
            'id_kecamatan.required' => 'Wajib Diisi!',
            'alamat.required' => 'Wajib Diisi!',
            'deskripsi_sekolah.required' => 'Wajib Diisi!',
            'icon.required' => 'Wajib Diisi!',
            'akreditasi' => 'Wajib Diisi!',
            'visi' => 'Wajib Diisi!',
            'misi' => 'Wajib Diisi!',
            'rombel' => 'Wajib Diisi!',
            'jurusan' => 'Wajib Diisi!',
        ], [
        ]);

        if (Request()->icon <> "") {
            $sekolah = $this->SekolahModel->DetailData($id_sekolah);
            if ($sekolah->icon <> "") {
                unlink(public_path('icon').'/'.$sekolah->icon);
            }
 
            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon'),$filename);
            $data = [
                'nama_sekolah' => Request()->nama_sekolah,
                'npsn_sekolah' => Request()->npsn_sekolah,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi_sekolah' => Request()->deskripsi_sekolah,
                'icon' => $filename,
                'akreditasi' => Request()->akreditasi,
                'visi' => Request()->visi,
                'misi' => Request()->misi,
                'rombel' => Request()->rombel,
                'jurusan' => Request()->jurusan,
            ];
            $this->SekolahModel->UpdateData($id_sekolah, $data);
        } else {
            $data = [
                'nama_sekolah' => Request()->nama_sekolah,
                'npsn_sekolah' => Request()->npsn_sekolah,
                'id_kategori' => Request()->id_kategori,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'posisi' => Request()->posisi,
                'deskripsi_sekolah' => Request()->deskripsi_sekolah,
                'akreditasi' => Request()->akreditasi,
                'visi' => Request()->visi,
                'misi' => Request()->misi,
                'rombel' => Request()->rombel,
                'jurusan' => Request()->jurusan,
            ];
            $this->SekolahModel->UpdateData($id_sekolah, $data);
        }
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Di Update.');
    }

    public function delete($id_sekolah)
    {
        $sekolah = $this->SekolahModel->DetailData($id_sekolah);
        if ($sekolah->icon <> "") {
            unlink(public_path('icon').'/'.$sekolah->icon);
        }

        $this->SekolahModel->DeleteData($id_sekolah);
        return redirect()->route('sekolah')->with('pesan', 'Data Berhasil Di Hapus');
    }

    
    
}
