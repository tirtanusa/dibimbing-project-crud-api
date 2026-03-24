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

        $course = Course::all();

        return $this->successResponse($course, 'Courses retrieved successfully');
    }

    public function show(string $request): JsonResponse{
        $course = Course::find($request);

        if(!$course){
            return $this->notFoundResponse();
        }

        return $this->successResponse($course, 'Course retrieved successfully');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:200',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer|min:0',
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

        return $this->createdResponse($course, 'Course created successfully');
    }
}
