<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class CourseController extends Controller
{
    use SoftDeletes, ApiResponse, AuthorizesRequests;
    //Get All Courses
    public function index(): JsonResponse
    {
        $cacheKey = 'courses_' . md5(request()->fullUrl());

         $course = Cache::remember($cacheKey, 60, function () {
             $query = Course::with(['category', 'instructor:id,name']);

             // Search Judul
             if(request()->has('search')){
                 $search = request('search');
                 $query->where('title', 'like', "%{$search}%");
             }

             // Filter level
             if(request()->has('level')){
                 $query->where('level', request('level'));
             }

             // Filter category
             if(request()->has('category_id')){
                 $query->where('category_id', request('category_id'));
             }

             // Sorting
             $sortBy = request('sort_by', 'created_at');
             $order = request('order', 'desc');

             if(in_array($sortBy, ['price','enrolled_count','rating','created_at']) &&
             in_array($order, ['asc','desc'])){
                 $query->orderBy($sortBy, $order);
             }

             return $query->get();
         });

        if($course->isEmpty()){
            return $this->notFoundResponse('Kursus tidak ditemukan');
        }

        return $this->successResponse($course, 'Data kursus berhasil diambil');
    }

    public function show(string $request): JsonResponse{
        $course = Cache::remember('courses.' . $request, 60, function () use ($request) {
            return Course::with(['category', 'instructor:id,name'])->findOrFail($request);
        });

        if(!$course){
            return $this->notFoundResponse();
        }

        return $this->successResponse($course, 'Data kursus berhasil diambil');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:200',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer|min:0',
            'enrolled_count' => 'nullable|integer|min:0',
            'rating' => 'nullable|numeric|min:0|max:10',
            'max_student' => 'required|integer|min:0',
            'current_student' => 'nullable|integer|min:0',
            'level' => 'nullable|string|in:beginner,intermediate,advanced',
            'status' => 'nullable|string|in:draft,published',
            'instructor_id' => 'required|exists:users,id',
            'category_id' => 'nullable|exists:categories,id'
        ], [

            // TITLE
            'title.required' => 'Title tidak boleh kosong',
            'title.string' => 'Title harus berupa teks',
            'title.min' => 'Title minimal 3 karakter',
            'title.max' => 'Title maksimal 200 karakter',

            // DESCRIPTION
            'description.required' => 'Description tidak boleh kosong',
            'description.string' => 'Description harus berupa teks',
            'description.max' => 'Description maksimal 1000 karakter',

            // PRICE
            'price.required' => 'Price tidak boleh kosong',
            'price.integer' => 'Price harus berupa angka',
            'price.min' => 'Price tidak boleh kurang dari 0',

            // ENROLLED COUNT
            'enrolled_count.integer' => 'Enrolled count harus berupa angka',
            'enrolled_count.min' => 'Enrolled count tidak boleh kurang dari 0',
            // ENROLLED COUNT

            // RATING
            'rating.numeric' => 'Rating harus berupa angka',
            'rating.min' => 'Rating tidak boleh kurang dari 0',
            'rating.max' => 'Rating tidak boleh lebih dari 10',
            // RATING

            // MAX STUDENT
            'max_student.required' => 'Max student tidak boleh kosong',
            'max_student.integer' => 'Max student harus berupa angka',
            'max_student.min' => 'Max student tidak boleh kurang dari 0',

            // CURRENT STUDENT
            'current_student.integer' => 'Current student harus berupa angka',
            'current_student.min' => 'Current student tidak boleh kurang dari 0',

            // LEVEL
            'level.in' => 'Level harus beginner, intermediate, atau advanced',

            // STATUS
            'status.in' => 'Status harus draft atau published',

            // INSTRUCTOR
            'instructor_id.required' => 'Instructor wajib diisi',
            'instructor_id.exists' => 'Instructor tidak ditemukan',

            // CATEGORY
            'category_id.exists' => 'Category tidak ditemukan'
        ]);

        $course = Course::create($validated);

        return $this->createdResponse($course, 'Kursus berhasil dibuat');
    }

    public function update(Request $request, $id): JsonResponse
    {
        $course = Course::findOrFail($id);

        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'sometimes|string|min:3|max:200',
            'description' => 'sometimes|string|max:1000',
            'price' => 'sometimes|integer|min:0',
            'max_student' => 'sometimes|integer|min:0',
            'current_student' => 'nullable|integer|min:0',
            'level' => 'nullable|string|in:beginner,intermediate,advanced',
            'status' => 'nullable|string|in:draft,published',
            'instructor_id' => 'sometimes|exists:users,id',
            'category_id' => 'nullable|exists:categories,id'
        ], [

            // TITLE
            'title.string' => 'Title harus berupa teks',
            'title.min' => 'Title minimal 3 karakter',
            'title.max' => 'Title maksimal 200 karakter',

            // DESCRIPTION
            'description.string' => 'Description harus berupa teks',
            'description.max' => 'Description maksimal 1000 karakter',

            // PRICE
            'price.integer' => 'Price harus berupa angka',
            'price.min' => 'Price tidak boleh kurang dari 0',

            // MAX STUDENT
            'max_student.integer' => 'Max student harus berupa angka',
            'max_student.min' => 'Max student tidak boleh kurang dari 0',

            // CURRENT STUDENT
            'current_student.integer' => 'Current student harus berupa angka',
            'current_student.min' => 'Current student tidak boleh kurang dari 0',

            // LEVEL
            'level.in' => 'Level harus beginner, intermediate, atau advanced',

            // STATUS
            'status.in' => 'Status harus draft atau published',

            // INSTRUCTOR
            'instructor_id.exists' => 'Instructor tidak ditemukan',

            // CATEGORY
            'category_id.exists' => 'Category tidak ditemukan'
        ]);

        $course->update($validated);

        return $this->successResponse($course, 'Course updated successfully');
    }

    public function destroy($id): JsonResponse{
        $course = Course::findOrFail($id);

        $this->authorize('delete', $course);

        $course->delete();

        return $this->successResponse($course, 'Data berhasil dihapus');
    }

    public function topRated(): JsonResponse{
        $cacheKey = 'courses_top';

        $topCourses = Cache::remember($cacheKey, 60, function () {
            return Course::with(['category', 'instructor:id,name'])
                ->orderBy('rating', 'desc')
                ->take(5)
                ->get();
        });

        if($topCourses->isEmpty()){
            return $this->notFoundResponse('Kursus tidak ditemukan');
        }

        return $this->successResponse($topCourses, 'Data kursus terbaik berhasil diambil');
    }

    public function lowestPrice(): JsonResponse{
        $cacheKey = 'courses_lowest_price';

        $lowestPriceCourses = Cache::remember($cacheKey, 60, function () {
            return Course::with(['category', 'instructor:id,name'])
                ->orderBy('price', 'asc')
                ->take(5)
                ->get();
        });

        if($lowestPriceCourses->isEmpty()){
            return $this->notFoundResponse('Kursus tidak ditemukan');
        }

        return $this->successResponse($lowestPriceCourses, 'Data kursus dengan harga terendah berhasil diambil');
    }
}
