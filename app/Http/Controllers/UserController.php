<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use SoftDeletes, ApiResponse;

    public function index(): JsonResponse{
        $users = User::all();

        if(!$users){
            return $this->notFoundResponse();
        }

        return $this->successResponse($users, 'Users retrieved successfully');
    }


    public function store(Request $request): JsonResponse{

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|string|min:3|max:100',
            'password' => 'required|string|min:8|max:16',
            'phone' => 'required|string|min:11|max:20',
            'role' => 'nullable|string|in:user,instructor',
        ],[
            //Name
            'name.required' => 'Name tidak boleh kosong',
            'name.string' => 'Name harus berupa teks',
            'name.min' => 'Name minimal 3 karakter',
            'name.max' => 'Name maksimal 100 karakter',
            //Name

            //Email
            'email.required' => 'email tidak boleh kosong',
            'email.string' => 'email harus berupa teks',
            'email.min' => 'email minimal 3 karakter',
            'email.max' => 'email maksimal 100 karakter',
            //Email

            //Password
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password harus berupa teks',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 16 karakter',
            //Password

            //Password
            'phone.required' => 'Nomor telepon tidak boleh kosong',
            'phone.string' => 'Nomor telepon harus berupa teks',
            'phone.min' => 'Nomor telepon minimal 11 karakter',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            //Password

            //Role
            'role.string' => 'Role harus berupa teks',
            'role.in' => 'Role harus berupa user atau instructor'
            //Role
        ]);

        $users = User::create($validated);

        return $this->createdResponse($users);
    }
}
