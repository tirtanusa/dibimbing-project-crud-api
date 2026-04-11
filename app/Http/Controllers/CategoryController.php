<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class CategoryController extends Controller
{
    use SoftDeletes, ApiResponse;

    public function index(): JsonResponse{
        $data = Cache::remember('categories', 60, function () {
            return Category::all();
        });

        return $this->successResponse($data, 'Kategori berhasil diambil');
    }

    public function show(string $id){
        $data = Cache::remember('categories.' . $id, 60, function () use ($id) {
            return Category::findOrFail($id);
        });

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

    public function destroy(string $id): JsonResponse{
        $data = Category::findOrFail($id);
        $data->delete();

        return $this->successResponse(null, "Kategori berhasil dihapus");
    }
}
