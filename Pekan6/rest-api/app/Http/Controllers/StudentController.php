<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // Menggunakan model Student untuk mengambil semua data mahasiswa
        $students = Student::all();

        if (!$students->isEmpty()) {
            $response = [
                'message' => 'Menampilkan Data Semua Student',
                'data' => $students,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ada'
            ];
            return response()->json($response, 404);
        }
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:10',
            'email' => 'required|email',
            'jurusan' => 'required|string|max:255',
        ]);

        // Membuat mahasiswa baru menggunakan data dari request
        $student = Student::create($request->all());

        $response = [
            'message' => 'Data Student Berhasil Dibuat',
            'data' => $student,
        ];

        return response()->json($response, 201);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $response = [
                'message' => 'Menampilkan Detail Student',
                'data' => $student,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:10',
            'email' => 'required|email',
            'jurusan' => 'required|string|max:255',
        ]);

        $student = Student::find($id);

        if ($student) {
            $student->update($request->all());

            $response = [
                'message' => 'Data Student Berhasil Diperbarui',
                'data' => $student,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $response = [
                'message' => 'Data Student Berhasil Dihapus',
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }
}
