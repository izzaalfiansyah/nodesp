<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeadaanRequest;
use App\Models\Keadaan;

class KeadaanController extends Controller
{
    public function index()
    {
        $items = Keadaan::all();
        return view('keadaan.index', compact('items'));
    }

    public function create()
    {
        return view('keadaan.create');
    }

    public function show()
    {
        return view('keadaan.show');
    }

    public function store(KeadaanRequest $req)
    {
        $data = $req->validate();

        if ($item = Keadaan::create($data)) {
            $success = true;
        } else {
            $success = false;
        }

        return redirect()->route('keadaan')->with('success', $success);
    }

    public function edit($id)
    {
        $item = Keadaan::find($id);
        return view('keadaan.edit', compact('item'));
    }

    public function update(KeadaanRequest $req, $id)
    {
        $data = $req->validate();

        if ($item = Keadaan::find($id)->update($data)) {
            $success = true;
        } else {
            $success = false;
        }

        return redirect()->route('keadaan')->with('success', $success);
    }

    public function destroy($id)
    {
        if ($item = Keadaan::find($id)->delete()) {
            $success = true;
        } else {
            $success = false;
        }

        return redirect()->route('keadaan')->with('success', $success);
    }
}
