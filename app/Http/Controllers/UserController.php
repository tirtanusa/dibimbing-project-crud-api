<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use SoftDeletes;

    public function index(): JsonResponse{
        $users = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully',
            'data' => $users
        ]);
    }


    public function store(Request $request): JsonResponse{

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|min:3|max:100',
            'password' => 'required|string|min:8|max:16',
            'phone' => 'required|string|min:11|max:20',
            'role' => 'nullable|string|in:user,instructor',
        ],[]);

        $users = User::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $users
        ]);
    }
}
