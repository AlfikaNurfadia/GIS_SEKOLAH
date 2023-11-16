<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_kategori')->get();
    }

    public function InsertData($data)
    {
        DB::table('tbl_kategori')->insert($data);
    }

    public function DetailData($id_kategori)
    {
        return DB::table('tbl_kategori')->where('id_kategori', $id_kategori)->first();
    }

    public function UpdateData($id_kategori, $data)
    {
        DB::table('tbl_kategori')->where('id_kategori', $id_kategori)->update($data);
    }

    public function DeleteData($id_kategori)
    {
        DB::table('tbl_kategori')->where('id_kategori', $id_kategori)->delete();
    }
}
