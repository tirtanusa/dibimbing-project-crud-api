<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SoftDeletes, ApiResponse;

    public function index(): JsonResponse{
        $data = Category::all();

        return $this->successResponse($data, 'Kategori berhasil diambil');
    }

    public function show(string $id){
        $data = Category::findOrFail($id);

        if(!$data){
            return $this->notFoundResponse();
        }

        return $this->successResponse($data, "Kategori berhasil diambil");
    }

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
}
