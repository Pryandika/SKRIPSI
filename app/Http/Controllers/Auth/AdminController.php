<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klinik;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function showAdmin()
    {
        $chart_options = [
            'chart_title' => 'Jumlah Pasien Mendaftar',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'conditions'            => [
                ['condition' => 'role = 1', 'color' => 'black', 'fill' => true],
                ['condition' => 'role = 0', 'color' => 'blue', 'fill' => true],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
        
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.adminDash', ['users' => $user, 'kliniks' => $klinik], compact('chart1'));
    }

    public function showTambahDokter()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.tambahDokter', ['users' => $user, 'kliniks' => $klinik]);
    }

    public function showPolaTarif()
    {
        $user = User::all();
        $klinik = Klinik::all();
        return view('admin.polaTarif', ['users' => $user, 'kliniks' => $klinik]);
    }
}
