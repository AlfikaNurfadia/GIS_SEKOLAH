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
            'kecamatan' => $this->WebModel->DataKecamatan(),
        ];
        return view('layouts.v_web', $data);
    }
}
