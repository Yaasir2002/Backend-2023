<?php

namespace App\Http\Controllers;

use App\Models\User; // Sesuaikan dengan lokasi model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Membuat fungsi register
    public function register(Request $request)
    {
        // Menangkap input
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // Memasukkan data ke tabel user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully',
        ];

        return response()->json($data, 200);
    }

    // Membuat fungsi login
    public function login(Request $request)
    {
        // Menangkap input
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Mengambil data user berdasarkan email
        $user = User::where('email', $input['email'])->first();

        // Memeriksa apakah login berhasil
        $isLoginSuccessfully = ($user && Hash::check($input['password'], $user->password));

        if ($isLoginSuccessfully) {
            // Membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login successfully',
                'token' => $token->plainTextToken,
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Login failed',
            ];

            return response()->json($data, 401);
        }
    }
}
