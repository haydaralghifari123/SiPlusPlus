<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraDashboardController extends Controller
{
    public function index()
    {
        return view('mitra.dashboard');
    }
}
