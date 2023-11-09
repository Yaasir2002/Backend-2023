<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = [
        ["name" => "panda"],
        ["name" => "nyamuk"],
        ["name" => "ayam"]
    ];

    # method index - menampilkan data animals
    public function index()
    {
        return response()->json($this->animals);
    }

    # method store - menambahkan hewan baru
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        // Contoh validasi: $this->validate($request, [
        //     'name' => 'required|string|max:255',
        // ]);

        $newAnimal = ["name" => $request->input('name')];
        array_push($this->animals, $newAnimal);

        return response()->json($this->animals);
    }

    # method update - mengupdate hewan
    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        // Contoh validasi: $this->validate($request, [
        //     'name' => 'required|string|max:255',
        // ]);

        if (array_key_exists($id, $this->animals)) {
            $this->animals[$id] = ["name" => $request->input('name')];
        }

        return response()->json($this->animals);
    }

    # method destroy - menghapus hewan
    public function destroy($id)
    {
        if (array_key_exists($id, $this->animals)) {
            unset($this->animals[$id]);
        }

        return response()->json($this->animals);
    }
}
