<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class HomeController extends Controller
{
    // menampilkan halaman dengan controller

    public function index()
    {
        return view('welcome');
    }
}
