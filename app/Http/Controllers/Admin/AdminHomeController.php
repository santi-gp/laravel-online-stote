<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){
        $adminData = [];
        $adminData['title'] ='Admin - Tienda Online';
        $adminData['subtitle'] = 'Admin - Panel Inicio';
        return view('admin.home.index')
            ->with('adminData', $adminData);
    }
}
