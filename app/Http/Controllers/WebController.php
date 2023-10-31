<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pemetaan',
        ];
        return view('layouts.v_web', $data);
    }
}
