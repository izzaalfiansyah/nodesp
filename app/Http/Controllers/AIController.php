<?php

namespace App\Http\Controllers;

use App\Models\Keadaan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AIController extends Controller
{
    public function send(Request $req)
    {
        $schema = Validator::make($req->all(), ['message' => 'required']);

        if ($schema->fails()) {
            return new Response([
                'success' => false,
                'message' => 'Pesan tidak diketahui',
            ]);
        }

        $message = $req->message;

        if (preg_match('/siapa namamu/i', $message)) {
            return new Response([
                'success' => true,
                'message' => "Namaku Skydash. Aku akan menguasai dunia!",
            ]);
        } else if (preg_match('/siapa namaku/i', $message)) {
            $myname = Session::has('myname') ? Session::get('myname') : '';

            return new Response([
                'success' => true,
                'message' => $myname ? "Halo $myname!" : 'Maaf, aku tidak tahu namamu, cobalah ketikkan namamu!',
            ]);
        } else if (preg_match('/namaku/i', $message)) {
            $myname = str_replace('namaku ', '', strtolower($message));
            $myname = str_replace('adalah ', '', $myname);
            $myname = ucwords($myname);

            Session::put('myname', $myname);

            return new Response([
                'success' => true,
                'message' => "Halo $myname! Aku akan mengingatmu."
            ]);
        } else if (preg_match('/suhu/i', $message) || preg_match('/kelembaban/i', $message) || preg_match('/keadaan/i', $message) || preg_match('/cuaca/i', $message)) {
            $item = Keadaan::latest()->first();
            $temperatur = $item->temperatur;
            $kelembaban = $item->kelembaban;

            return new Response([
                'success' => true,
                'message' => "Diketahui saat ini temperatur $temperatur`C dan kelembaban $kelembaban%",
            ]);
        } else if (preg_match('/hidup/i', $message)) {
            return new Response([
                'success' => true,
                'message' => 'Sistem dihidupkan.'
            ]);
        } else if (preg_match('/mati/i', $message)) {
            return new Response([
                'success' => true,
                'message' => 'Sistem dimatikan.'
            ]);
        } else if (preg_match('/gabut/i', $message)) {
            $kegiatan = ['bermain game', 'berolahraga', 'menyanyi', 'jalan-jalan', 'tidur'];
            $pilihan = $kegiatan[random_int(0, count($kegiatan) - 1)];
            return new Response([
                'success' => true,
                'message' => "Aku sarankan kamu $pilihan.",
            ]);
        } else if (preg_match('/jam/i', $message) || preg_match('/pukul berapa/i', $message)) {
            $jam = date('H:i');
            return new Response([
                'success' => true,
                'message' => "Sekarang pukul $jam.",
            ]);
        } else if (preg_match('/tanggal/i', $message)) {
            $tanggal = date('d M Y');
            return new Response([
                'success' => true,
                'message' => "Sekarang tanggal $tanggal.",
            ]);
        } else {
            return new Response([
                'success' => true,
                'message' => 'Maaf, perintah tidak diketahui.'
            ]);
        }
    }
}
