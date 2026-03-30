<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                "name" => "Backend Development"
            ],
            [
                "name" => "Frontend Development"
            ],
            [
                "name" => "Fullstack Development"
            ],
            [
                "name" => "Mobile Development"
            ],
            [
                "name" => "Data Science"
            ],
            [
                "name" => "Machine Learning"
            ],
            [
                "name" => "DevOps"
            ],
            [
                "name" => "Cyber Security"
            ],
            [
                "name" => "Cloud Computing"
            ],
            [
                "name" => "UI/UX Design"
            ]
        ]);
    }
}
