<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
    public function DataKecamatan()
    {
        return DB::table('tbl_kecamatan')->get();
    }

    public function DataKategori()
    {
        return DB::table('tbl_kategori')->get();
    }

    public function DetailKategori($id_kategori)
    {
        return DB::table('tbl_kategori')->where('id_kategori', $id_kategori)->first();
    }

    public function DataSekolahKategori($id_kategori)
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('tbl_sekolah.id_kategori', $id_kategori)
            ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function DataSekolah($id_kecamatan)
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('tbl_sekolah.id_kecamatan', $id_kecamatan)
            ->get();
    }

    public function AllDataSekolah()
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->get();
    }

    public function DetailDataSekolah($id_sekolah)
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->where('id_sekolah', $id_sekolah)
            // ->when($id_sekolah, function ($query, $id_sekolah) {
            //     return $query->where('tbl_sekolah.id_sekolah', $id_sekolah);
            // })
            ->first();
    }

    public function semuadatasekolah()
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->get();
    }
}
