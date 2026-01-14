<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard', [
            'totalBarang'     => Barang::count(),
            'totalSupplier'   => Supplier::count(),
            'totalTransaksi'  => Transaksi::count(),
        ]);
    }
}
