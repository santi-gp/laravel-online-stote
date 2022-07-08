<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $viewHome = [];
        $viewHome['title'] = 'Inicio';
        return view('home.index')
            ->with('viewHome', $viewHome);
    }
}
