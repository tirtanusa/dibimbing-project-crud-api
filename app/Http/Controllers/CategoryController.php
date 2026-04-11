<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use OpenApi\Attributes as OA;


class CategoryController extends Controller
{
    use SoftDeletes, ApiResponse;

    #[OA\Get(
        path: "/categories",
        summary: "Get all categories",
        tags: ["Categories"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Kategori Berhasil diambil"
            ),
            new OA\Response(
                response: 404,
                description: "Category not found"
            ),
            new OA\Response(
                response: 500,
                description: "Internal server error"
            )
        ]
    )]
    public function index(): JsonResponse{
        $data = Cache::remember('categories', 60, function () {
            return Category::all();
        });

        return $this->successResponse($data, 'Kategori berhasil diambil');
    }

    #[
        OA\GET(
            path: "/categories/{id}",
            summary: "Get a specific category",
            tags: ["Categories"],
            parameters: [
                new OA\Parameter(
                    name: "id",
                    in: "path",
                    description: "Category ID",
                    required: true,
                    schema: new OA\Schema(type: "string")
                )
            ],
            responses: [
                new OA\Response(
                    response: 200,
                    description: "Kategori Berhasil diambil"
                ),
                new OA\Response(
                    response: 404,
                    description: "Data tidak ditemukan"
                ),
                new OA\Response(
                    response: 500,
                    description: "Internal server error"
                )
            ]
        )
    ]
    public function show(string $id){
        $data = Cache::remember('categories.' . $id, 60, function () use ($id) {
            return Category::findOrFail($id);
        });

        if(!$data){
            return $this->notFoundResponse();
        }

        return $this->successResponse($data, "Kategori berhasil diambil");
    }

    #[
        OA\Post(
            path: "/categories",
            summary: "Create a new category",
            tags: ["Categories"],
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: "name",
                            type: "string",
                            description: "Name of the category",
                            example: "Elektronik"
                        )
                    ]
                )
            ),
            responses: [
                new OA\Response(
                    response: 201,
                    description: "Data berhasil dibuat"
                ),
                new OA\Response(
                    response: 422,
                    description: "Validation error"
                )
            ]
        )
    ]
    public function store(Request $request){

        $validated = $request->validate([
            "name" => "required|string|min:3|max:100|"
        ],[
            'name.required' => 'Name tidak boleh kosong',
            'name.string' => 'Name harus berupa teks',
            'name.min' => 'Name minimal 3 karakter',
            'name.max' => 'Name maksimal 100 karakter'
        ]);

        $data = Category::create($validated);

        return $this->createdResponse($data);
    }

    #[
        OA\Put(
            path: "/categories/{id}",
            summary: "Update a specific category",
            tags: ["Categories"],
            parameters: [
                new OA\Parameter(
                    name: "id",
                    in: "path",
                    description: "Category ID",
                    required: true,
                    schema: new OA\Schema(type: "string")
                )
            ],
            requestBody: new OA\RequestBody(
                required: true,
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(
                            property: "name",
                            type: "string",
                            description: "Name of the category",
                            example: "Elektronik"
                        )
                    ]
                )
            ),
            responses: [
                new OA\Response(
                    response: 200,
                    description: "Data berhasil diperbarui"
                ),
                new OA\Response(
                    response: 422,
                    description: "Validation error"
                )
            ]
        )
    ]

    public function update(string $id, Request $request): JsonResponse{
        $validated = $request->validate([
            "name" => "required|string|min:3|max:100|"
        ],[
            'name.required' => 'Name tidak boleh kosong',
            'name.string' => 'Name harus berupa teks',
            'name.min' => 'Name minimal 3 karakter',
            'name.max' => 'Name maksimal 100 karakter'
        ]);

        $data = Category::findOrFail($id);
        $data->update($validated);

        return $this->successResponse($data, "Kategori berhasil diperbarui");
    }

    #[
        OA\Delete(
            path: "/categories/{id}",
            summary: "Delete a specific category",
            tags: ["Categories"],
            parameters: [
                new OA\Parameter(
                    name: "id",
                    in: "path",
                    description: "Category ID",
                    required: true,
                    schema: new OA\Schema(type: "string")
                )
            ],
            responses: [
                new OA\Response(
                    response: 200,
                    description: "Kategori berhasil dihapus"
                ),
                new OA\Response(
                    response: 404,
                    description: "Data tidak ditemukan"
                )
            ]
        )
    ]

    public function destroy(string $id): JsonResponse{
        $data = Category::findOrFail($id);
        $data->delete();

        return $this->successResponse(null, "Kategori berhasil dihapus");
    }
}
