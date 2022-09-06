<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalanController extends Controller
{
    public function index()
    {
        return view('kalan');
    }
}
