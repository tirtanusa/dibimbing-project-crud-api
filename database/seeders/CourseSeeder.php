<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::insert([
            [
                "title" => "Laravel REST API Development",
                "description" => "Belajar membuat REST API menggunakan Laravel",
                "price" => 150000,
                "max_student" => 100,
                "current_student" => 20,
                "level" => "intermediate",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 1
            ],
            [
                "title" => "Node.js Backend Fundamentals",
                "description" => "Membangun backend modern menggunakan Node.js",
                "price" => 140000,
                "max_student" => 80,
                "current_student" => 10,
                "level" => "beginner",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 1
            ],
            [
                "title" => "React JS Complete Guide",
                "description" => "Belajar membuat aplikasi web modern menggunakan React",
                "price" => 160000,
                "max_student" => 90,
                "current_student" => 30,
                "level" => "beginner",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 2
            ],
            [
                "title" => "Vue.js Frontend Development",
                "description" => "Membuat UI interaktif dengan Vue.js",
                "price" => 140000,
                "max_student" => 70,
                "current_student" => 15,
                "level" => "intermediate",
                "status" => "draft",
                "instructor_id" => 1,
                "category_id" => 2
            ],
            [
                "title" => "Fullstack MERN Stack",
                "description" => "Membangun aplikasi fullstack menggunakan MongoDB, Express, React, Node",
                "price" => 180000,
                "max_student" => 60,
                "current_student" => 12,
                "level" => "advanced",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 3
            ],
            [
                "title" => "Flutter Mobile App Development",
                "description" => "Belajar membuat aplikasi mobile menggunakan Flutter",
                "price" => 170000,
                "max_student" => 75,
                "current_student" => 18,
                "level" => "beginner",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 4
            ],
            [
                "title" => "Python for Data Science",
                "description" => "Analisis data menggunakan Python dan Pandas",
                "price" => 150000,
                "max_student" => 80,
                "current_student" => 22,
                "level" => "beginner",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 5
            ],
            [
                "title" => "Machine Learning Fundamentals",
                "description" => "Belajar konsep dasar machine learning",
                "price" => 200000,
                "max_student" => 50,
                "current_student" => 10,
                "level" => "intermediate",
                "status" => "draft",
                "instructor_id" => 1,
                "category_id" => 6
            ],
            [
                "title" => "Docker & DevOps Basics",
                "description" => "Containerization dan CI/CD menggunakan Docker",
                "price" => 160000,
                "max_student" => 65,
                "current_student" => 8,
                "level" => "intermediate",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 7
            ],
            [
                "title" => "UI/UX Design with Figma",
                "description" => "Belajar desain UI/UX menggunakan Figma",
                "price" => 130000,
                "max_student" => 70,
                "current_student" => 16,
                "level" => "beginner",
                "status" => "published",
                "instructor_id" => 1,
                "category_id" => 10
            ]
        ]);
    }
}
