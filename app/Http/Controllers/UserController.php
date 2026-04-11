<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
    //
    use SoftDeletes, ApiResponse;

    #[OA\Get(
        path: "/users",
        summary: "Get all users",
        tags: ["Users"],
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "List of users"
            ),
            new OA\Response(
                response: 404,
                description: "Users not found"
            )
        ]
    )]

    public function index(): JsonResponse{
        $users = Cache::remember('users', 60, function(){
            return User::all();
        });

        if($users->isEmpty()){
            return $this->notFoundResponse();
        }

        return $this->successResponse($users, 'Data User berhasil diambil');
    }

    #[OA\Post(
        path: "/users",
        summary: "Create new user",
        tags: ["Users"],
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name","email","password","phone"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Tirta"),
                    new OA\Property(property: "email", type: "string", example: "tirta@email.com"),
                    new OA\Property(property: "password", type: "string", example: "password123"),
                    new OA\Property(property: "phone", type: "string", example: "08123456789"),
                    new OA\Property(property: "role", type: "string", enum: ["user","instructor"])
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "User created successfully"
            ),
            new OA\Response(
                response: 422,
                description: "Validation error"
            )
        ]
    )]

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

        return $this->createdResponse($users, 'User berhasil dibuat');
    }

    #[OA\Get(
        path: "/users/{id}",
        summary: "Get user by ID",
        tags: ["Users"],
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "User data retrieved"
            ),
            new OA\Response(
                response: 404,
                description: "User not found"
            )
        ]
    )]

    public function show(string $id): JsonResponse{
        $user = Cache::remember('users.' . $id, 60, function () use ($id) {
            return User::findOrFail($id);
        });

        if(!$user){
            return $this->notFoundResponse();
        }

        return $this->successResponse($user, 'Data User berhasil diambil');
    }

    #[OA\Put(
        path: "/users/{id}",
        summary: "Update user",
        tags: ["Users"],
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "name", type: "string"),
                    new OA\Property(property: "email", type: "string"),
                    new OA\Property(property: "password", type: "string"),
                    new OA\Property(property: "phone", type: "string"),
                    new OA\Property(property: "role", type: "string", enum: ["user","instructor"])
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "User updated successfully"
            ),
            new OA\Response(
                response: 404,
                description: "User not found"
            )
        ]
    )]

    public function update(string $id, Request $request): JsonResponse{
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

        $user = User::findOrFail($id);
        $user->update($validated);

         return $this->successResponse($user, "User berhasil diperbarui");
    }

    #[OA\Delete(
        path: "/users/{id}",
        summary: "Delete user",
        tags: ["Users"],
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "User deleted successfully"
            ),
            new OA\Response(
                response: 404,
                description: "User not found"
            )
        ]
    )]

    public function destroy(string $id): JsonResponse{
        $user = User::findOrFail($id);
        $user->delete();

        return $this->successResponse(null, 'User berhasil dihapus');
    }
}
