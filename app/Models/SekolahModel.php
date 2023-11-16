<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SekolahModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_sekolah')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
            ->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_sekolah')->insert($data);
    }

    public function DetailData($id_sekolah)
    {
        return DB::table('tbl_sekolah')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori', '=', 'tbl_sekolah.id_kategori')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
        ->where('id_sekolah', $id_sekolah)->first();
        
    }

    public function UpdateData($id_sekolah, $data)
    {
        DB::table('tbl_sekolah')->where('id_sekolah', $id_sekolah)->update($data);
    }

    public function DeleteData($id_sekolah)
    {
        DB::table('tbl_sekolah')->where('id_sekolah', $id_sekolah)->delete();
    }

}
