<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                "name" => "John Instructor",
                "email" => "john@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567001",
                "role" => "instructor"
            ],
            [
                "name" => "Sarah Instructor",
                "email" => "sarah@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567002",
                "role" => "instructor"
            ],
            [
                "name" => "Michael Instructor",
                "email" => "michael@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567003",
                "role" => "instructor"
            ],
            [
                "name" => "David User",
                "email" => "david@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567004",
                "role" => "user"
            ],
            [
                "name" => "Emma User",
                "email" => "emma@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567005",
                "role" => "user"
            ],
            [
                "name" => "Olivia User",
                "email" => "olivia@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567006",
                "role" => "user"
            ],
            [
                "name" => "James User",
                "email" => "james@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567007",
                "role" => "user"
            ],
            [
                "name" => "Sophia User",
                "email" => "sophia@course.com",
                "password" => Hash::make("password"),
                "phone" => "081234567008",
                "role" => "user"
            ]
        ]);
    }
}
