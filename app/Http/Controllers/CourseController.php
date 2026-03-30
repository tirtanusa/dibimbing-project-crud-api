<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use SoftDeletes, ApiResponse;

    //Get All Courses
    public function index(): JsonResponse{

        $course = Course::with(['category', 'instructor:id,name'])->get();

        if(!$course){
            return $this->notFoundResponse();
        }

        //Search Judul
        if(request()->has('search')){
            $search = request()->query('search');
            $course = Course::with(['category', 'instructor:id,name'])->where('title', 'like', "%$search%")
            ->get();
        }
        //Search Judul

        //Filter level
        if(request()->has('level')){
            $level = request()->query('level');
            $course = Course::with(['category', 'instructor:id,name'])->where('level', $level)->get();
        }
        //Filter level

        //Filter Category
        if(request()->has('category_id')){
            $categoryId = request()->query('category_id');
            $course = Course::with(['category', 'instructor:id,name'])->where('category_id', $categoryId)->get();
        }
        //Filter Category

        //Sort Price,enrolled count, and rating accepting request sort_by and order
        if(request()->has('sort_by') && request()->has('order')){
            $sortBy = request()->query('sort_by');
            $order = request()->query('order');

            if(!$order){
                $order = 'desc';
            }

            if(!$sortBy){
                $sortBy = 'created_at';
            }

            if(in_array($sortBy, ['price', 'enrolled_count', 'rating']) && in_array($order, ['asc', 'desc'])){
                $course = Course::with(['category', 'instructor:id,name'])->orderBy($sortBy, $order)->get();
            }
        }
        //Sort Price


        return $this->successResponse($course, 'Data kursus berhasil diambil');
    }

    public function show(string $request): JsonResponse{
        $course = Course::with(['category', 'instructor:id,name'])->findOrFail($request);

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

        $course->delete();

        return $this->successResponse($course, 'Data berhasil dihapus');
    }
}
