<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeadaanRequest;
use App\Http\Resources\KeadaanResource;
use App\Models\Keadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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

        if ($tanggal = $req->tanggal) {
            $builder = $builder->where(DB::raw("date_format(created_at, '%Y-%m-%d')"), $tanggal);
        }

        $items = $builder->paginate(10);

        return KeadaanResource::collection($items);
    }

    public function showDetailByJam(Request $req)
    {
        $waktu = $req->waktu;
        if (!$waktu) {
            return Response::json(['message' => 'waktu tidak valid. gunakan format "YYYY-MM-DD-HH".'], 400);
        }

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

        return KeadaanResource::collection($items);
    }

    public function store(KeadaanRequest $req)
    {
        $data = $req->validated();

        $item = Keadaan::create($data);

        return $item;
    }
}
