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
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        $settings1  = [
            'chart_title' => 'Jumlah Pasien Hadir',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Laporan',
            'conditions'            => [
                ['condition' => 'status = "HADIR"', 'color' => 'blue', 'fill' => true]
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];
        $chart2 = new LaravelChart($settings1);

        $settings2  = [
            'chart_title' => 'Jumlah Pasien Tidak Hadir',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Laporan',
            'conditions'            => [
                ['condition' => 'status = "TIDAK HADIR"', 'color' => 'black', 'fill' => true]
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
        ];
        $chart3 = new LaravelChart($settings2);
        
        $user = User::all();
        $totuser = User::where('role', 0)->count();
        $totdokter = User::where('role',2)->count();
        $klinik = Klinik::all();
        $totklinik = Klinik::all()->count();
        return view('admin.adminDash', ['users' => $user, 'kliniks' => $klinik ], 
        compact('chart1', 'chart2', 'chart3', 'totuser', 'totdokter', 'totklinik'));
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
