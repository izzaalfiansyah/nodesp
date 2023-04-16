<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeadaanRequest;
use App\Models\Keadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeadaanController extends Controller
{
    public function index(Request $req)
    {
        $builder = new Keadaan();

        $builder = $builder->select(
            DB::raw("avg(kelembaban) as kelembaban"),
            DB::raw("avg(temperatur) as temperatur"),
            DB::raw("date_format(created_at, '%Y-%m-%d') as tanggal"),
            DB::raw("date_format(created_at, '%H') as jam"),
        );

        $builder = $builder->groupBy(DB::raw("date_format(created_at, '%Y-%m-%d')"));
        $builder = $builder->groupBy(DB::raw("date_format(created_at, '%H')"));

        $tanggal = $req->tanggal ?? date('Y-m-d');
        $builder = $builder->where(DB::raw("date_format(created_at, '%Y-%m-%d')"), $tanggal);

        $items = $builder->get();

        return view('keadaan.index', compact('items'));
    }

    public function showDetailByJam(Request $req, $waktu)
    {
        $builder = new Keadaan();

        $builder = $builder->select(
            DB::raw("avg(kelembaban) as kelembaban"),
            DB::raw("avg(temperatur) as temperatur"),
            DB::raw("date_format(created_at, '%Y-%m-%d') as tanggal"),
            DB::raw("date_format(created_at, '%H:%i') as jam"),
        );

        $builder = $builder->groupBy(DB::raw("date_format(created_at, '%Y-%m-%d')"));
        $builder = $builder->groupBy(DB::raw("date_format(created_at, '%H:%i')"));

        $builder = $builder->where(DB::raw("date_format(created_at, '%Y-%m-%d-%H')"), $waktu);

        $items = $builder->paginate(10);

        return view('keadaan.detail', compact('items'));
    }
}
