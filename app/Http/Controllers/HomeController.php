<?php

namespace App\Http\Controllers;
use App\Models\Dokumen;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // Hitung jumlah dokumen yang sudah diinputkan
         $documentCount = Dokumen::count();

         return view('home', compact('documentCount'));
    }
}