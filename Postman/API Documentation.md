# Project: LMS Dibimbing Project API
# 📁 Collection: Auth 
undefined 


## End-point: Login
### Method: POST
>```
>{{base_url}}/login
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "email":"admin1@example.com",
    "password": "tirtanusa123"
}
```

### 🔑 Authentication noauth

|Param|value|Type|
|---|---|---|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Login successful",
    "data": {
        "access_token": "1|YtSStRzE1ZXXZD68x9RAa1kLxIgFr6wntdM5lrgk2001c2c5",
        "token_type": "Bearer"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Register
### Method: POST
>```
>{{base_url}}/register
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "name" : "YOUR_NAME",
    "email" : "{{dynamic_email}}",
    "phone" : "08123456788",
    "password": "{{dynamic_password}}",
    "password_confirmation": "{{dynamic_password}}"
}
```

### 🔑 Authentication noauth

|Param|value|Type|
|---|---|---|


### Response: 201
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "name": "tirtanusa",
        "email": "admin1@example.com",
        "password": "$2y$12$ZjiK1pMMV1/UpqK9zpd2reqAbEgtNQIFpKw5/rsqPVR6sdniTAnbu",
        "phone": "08123456789",
        "role": "user",
        "id": 9
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Profile
### Method: GET
>```
>{{base_url}}/me
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "User profile retrieved successfully",
    "data": {
        "id": 9,
        "name": "tirtanusa",
        "email": "admin1@example.com",
        "password": "$2y$12$ZjiK1pMMV1/UpqK9zpd2reqAbEgtNQIFpKw5/rsqPVR6sdniTAnbu",
        "phone": "08123456789",
        "role": "user"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Log Out
### Method: POST
>```
>{{base_url}}/logout
>```
### Body (**raw**)

```json

```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Logout successful",
    "data": null
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Courses 
undefined 


## End-point: Fetch all courses
### Method: GET
>```
>http://127.0.0.1:8000/api/courses
>```
### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Courses retrieved successfully",
    "data": [
        {
            "id": 1,
            "title": "Laravel Backend Development",
            "description": "Belajar membangun REST API menggunakan Laravel dari dasar hingga advanced.",
            "price": "150000.00",
            "max_student": 50,
            "current_student": 0,
            "level": "beginner",
            "status": "draft",
            "instructor_id": 1,
            "category_id": 1,
            "formatted_price": "Rp. 150.000",
            "category": {
                "id": 1,
                "name": "Backend Development"
            },
            "instructor": {
                "id": 1,
                "name": "Tirtanusa Kurnia Adhi Perdana"
            }
        },
        {
            "id": 2,
            "title": "Javascript Fundamentals",
            "description": "Belajar dasar-dasar Javascript",
            "price": "100000.00",
            "max_student": 100,
            "current_student": 0,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 2,
            "formatted_price": "Rp. 100.000",
            "category": {
                "id": 2,
                "name": "Frontend Development"
            },
            "instructor": {
                "id": 1,
                "name": "Tirtanusa Kurnia Adhi Perdana"
            }
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Fetch course by id
## Fetch Course by ID

Retrieves the details of a single course based on its unique identifier. Returns full course information including pricing, enrollment stats, level, and status.

**Endpoint:** `GET /api/courses/{{id}}`

---

### Path Variable

| Variable | Type | Description |
| --- | --- | --- |
| `id` | integer | The unique identifier of the course to retrieve. |

---

### Successful Response (200 OK)

``` json
{
  "success": true,
  "message": "Course retrieved successfully",
  "data": {
    "id": 1,
    "title": "Laravel Backend Development",
    "description": "Belajar membangun REST API menggunakan Laravel",
    "price": "150000.00",
    "max_student": 50,
    "current_student": 0,
    "level": "beginner",
    "status": "draft",
    "instructor_id": 1,
    "category_id": null,
    "formatted_price": "Rp. 150.000"
  }
}

 ```

### Response Fields

| Field | Type | Description |
| --- | --- | --- |
| `success` | boolean | Indicates whether the request was successful. |
| `message` | string | A human-readable status message. |
| `data.id` | integer | Unique identifier of the course. |
| `data.title` | string | Title of the course. |
| `data.description` | string | Short description of the course content. |
| `data.price` | string | Raw price value of the course. |
| `data.max_student` | integer | Maximum number of students allowed to enroll. |
| `data.current_student` | integer | Number of students currently enrolled. |
| `data.level` | string | Difficulty level of the course (e.g., `beginner`). |
| `data.status` | string | Publication status of the course (e.g., `draft`). |
| `data.instructor_id` | integer | ID of the instructor who owns the course. |
| `data.category_id` | integer|null | ID of the category the course belongs to, or `null`. |
| `data.formatted_price` | string | Human-readable formatted price (e.g., `Rp. 150.000`). |
### Method: GET
>```
>http://127.0.0.1:8000/api/courses/{{id}}
>```
### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Course retrieved successfully",
    "data": {
        "id": 2,
        "title": "Javascript Fundamentals",
        "description": "Belajar dasar-dasar Javascript",
        "price": "100000.00",
        "max_student": 100,
        "current_student": 0,
        "level": "beginner",
        "status": "published",
        "instructor_id": 1,
        "category_id": 2,
        "formatted_price": "Rp. 100.000",
        "category": {
            "id": 2,
            "name": "Frontend Development"
        },
        "instructor": {
            "id": 1,
            "name": "Tirtanusa Kurnia Adhi Perdana"
        }
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Post a course
### Method: POST
>```
>http://127.0.0.1:8000/api/courses
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
  "title": "PHP Fundamentals",
  "description": "Belajar PHP dari 0 sampai mahir",
  "price": 99000,
  "max_student": 100,
  "current_student": 0,
  "level": "beginner",
  "status": "published",
  "instructor_id": 1
}
```

### Response: 201
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data berhasil ditambahkan",
    "data": {
        "title": "Laravel Backend Development",
        "description": "Belajar membangun REST API menggunakan Laravel dari dasar hingga advanced.",
        "price": 150000,
        "max_student": 50,
        "current_student": 0,
        "level": "beginner",
        "status": "draft",
        "instructor_id": 1,
        "id": 2,
        "formatted_price": "Rp. 150.000"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Update a course
### Method: PUT
>```
>http://127.0.0.1:8000/api/courses/{{id}}
>```
### Headers

|Content-Type|Value|
|---|---|
|Content-Type|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "title" : "React JS Complete Guide",
    "description" : "Belajar membuat aplikasi web modern menggunakan React",
    "price": 160000,
    "max_student": 90, 
    "current_student": 0,
    "level": "beginner",
    "status": "published",
    "instructor_id": "1",
    "category_id": "2" 
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Course updated successfully",
    "data": {
        "id": 2,
        "title": "Javascript Fundamentals",
        "description": "Belajar dasar-dasar Javascript",
        "price": 100000,
        "max_student": 100,
        "current_student": 0,
        "level": "beginner",
        "status": "published",
        "instructor_id": "1",
        "category_id": "2",
        "formatted_price": "Rp. 100.000"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Patch a course
### Method: PATCH
>```
>http://127.0.0.1:8000/api/courses/{{id}}
>```
### Headers

|Content-Type|Value|
|---|---|
|Content-Type|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "title": "Ini sudah dirubah"
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Course updated successfully",
    "data": {
        "id": 1,
        "title": "Laravel Backend Development",
        "description": "Belajar membangun REST API menggunakan Laravel dari dasar hingga advanced.",
        "price": "150000.00",
        "max_student": 50,
        "current_student": 0,
        "level": "beginner",
        "status": "draft",
        "instructor_id": 1,
        "category_id": 1,
        "formatted_price": "Rp. 150.000"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Delete a course
### Method: DELETE
>```
>http://127.0.0.1:8000/api/courses/{{id}}
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data berhasil dihapus",
    "data": {
        "id": 3,
        "title": "PHP Fundamentals",
        "description": "Belajar PHP dari 0 sampai mahir",
        "price": "99000.00",
        "max_student": 100,
        "current_student": 0,
        "level": "beginner",
        "status": "published",
        "instructor_id": 1,
        "category_id": null,
        "formatted_price": "Rp. 99.000"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Lowest Price Courses
### Method: GET
>```
>http://127.0.0.1:8000/api/courses/lowest-price
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json

```

### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data kursus terbaik berhasil diambil",
    "data": [
        {
            "id": 13,
            "title": "React JS Complete Guide",
            "description": "Belajar membuat aplikasi web modern menggunakan React",
            "price": "160000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 90,
            "current_student": 0,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 2,
            "formatted_price": "Rp. 160.000",
            "category": {
                "id": 2,
                "name": "Frontend Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 14,
            "title": "Vue.js Frontend Development",
            "description": "Membuat UI interaktif dengan Vue.js",
            "price": "140000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 70,
            "current_student": 15,
            "level": "intermediate",
            "status": "draft",
            "instructor_id": 1,
            "category_id": 2,
            "formatted_price": "Rp. 140.000",
            "category": {
                "id": 2,
                "name": "Frontend Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 15,
            "title": "Fullstack MERN Stack",
            "description": "Membangun aplikasi fullstack menggunakan MongoDB, Express, React, Node",
            "price": "180000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 60,
            "current_student": 12,
            "level": "advanced",
            "status": "published",
            "instructor_id": 1,
            "category_id": 3,
            "formatted_price": "Rp. 180.000",
            "category": {
                "id": 3,
                "name": "Fullstack Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 16,
            "title": "Flutter Mobile App Development",
            "description": "Belajar membuat aplikasi mobile menggunakan Flutter",
            "price": "170000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 75,
            "current_student": 18,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 4,
            "formatted_price": "Rp. 170.000",
            "category": {
                "id": 4,
                "name": "Mobile Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 17,
            "title": "Python for Data Science",
            "description": "Analisis data menggunakan Python dan Pandas",
            "price": "150000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 80,
            "current_student": 22,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 5,
            "formatted_price": "Rp. 150.000",
            "category": {
                "id": 5,
                "name": "Data Science"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Get Top Rated Courses
### Method: GET
>```
>http://127.0.0.1:8000/api/courses/top-rated
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data kursus terbaik berhasil diambil",
    "data": [
        {
            "id": 13,
            "title": "React JS Complete Guide",
            "description": "Belajar membuat aplikasi web modern menggunakan React",
            "price": "160000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 90,
            "current_student": 0,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 2,
            "formatted_price": "Rp. 160.000",
            "category": {
                "id": 2,
                "name": "Frontend Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 14,
            "title": "Vue.js Frontend Development",
            "description": "Membuat UI interaktif dengan Vue.js",
            "price": "140000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 70,
            "current_student": 15,
            "level": "intermediate",
            "status": "draft",
            "instructor_id": 1,
            "category_id": 2,
            "formatted_price": "Rp. 140.000",
            "category": {
                "id": 2,
                "name": "Frontend Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 15,
            "title": "Fullstack MERN Stack",
            "description": "Membangun aplikasi fullstack menggunakan MongoDB, Express, React, Node",
            "price": "180000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 60,
            "current_student": 12,
            "level": "advanced",
            "status": "published",
            "instructor_id": 1,
            "category_id": 3,
            "formatted_price": "Rp. 180.000",
            "category": {
                "id": 3,
                "name": "Fullstack Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 16,
            "title": "Flutter Mobile App Development",
            "description": "Belajar membuat aplikasi mobile menggunakan Flutter",
            "price": "170000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 75,
            "current_student": 18,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 4,
            "formatted_price": "Rp. 170.000",
            "category": {
                "id": 4,
                "name": "Mobile Development"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        },
        {
            "id": 17,
            "title": "Python for Data Science",
            "description": "Analisis data menggunakan Python dan Pandas",
            "price": "150000.00",
            "enrolled_count": 0,
            "rating": 0,
            "max_student": 80,
            "current_student": 22,
            "level": "beginner",
            "status": "published",
            "instructor_id": 1,
            "category_id": 5,
            "formatted_price": "Rp. 150.000",
            "category": {
                "id": 5,
                "name": "Data Science"
            },
            "instructor": {
                "id": 1,
                "name": "John Instructor"
            }
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Users 
undefined 


## End-point: Fetch Users
### Method: GET
>```
>http://127.0.0.1:8000/api/users
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Users retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Tirtanusa Kurnia Adhi Perdana",
            "email": "tirtanusa123@gmail.com",
            "password": "tirtanusakeren",
            "phone": "081234567891",
            "role": "user"
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Add Users
### Method: POST
>```
>http://127.0.0.1:8000/api/users
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Content-Type|application/json|


### Body (**raw**)

```json
{
    "name" : "Tirtanusa Kurnia Adhi Perdana",
    "email" : "tirtanusa123@gmail.com",
    "password" : "tirtanusakeren",
    "phone" : "081234567891"
}
```

### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data berhasil ditambahkan",
    "data": {
        "name": "Tirtanusa Kurnia Adhi Perdana",
        "email": "tirtanusa123@gmail.com",
        "password": "tirtanusakeren",
        "phone": "081234567891",
        "id": 1
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
# 📁 Collection: Categories 
undefined 


## End-point: Fetch categories
### Method: GET
>```
>http://127.0.0.1:8000/api/categories
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### 🔑 Authentication noauth

|Param|value|Type|
|---|---|---|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Categories retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Backend Development"
        },
        {
            "id": 2,
            "name": "Frontend Development"
        }
    ]
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Fetch category by id
### Method: GET
>```
>http://127.0.0.1:8000/api/categories/1
>```
### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 200
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Category retrieved successfully",
    "data": {
        "id": 1,
        "name": "Backend Development"
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Add category
### Method: POST
>```
>http://127.0.0.1:8000/api/categories
>```
### Headers

|Content-Type|Value|
|---|---|
|Content-Type|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Body (**raw**)

```json
{
    "name" : "Frontend Development"
}
```

### 🔑 Authentication bearer

|Param|value|Type|
|---|---|---|
|token|{{token}}|string|


### Response: 201
<details open style="width: fit-content; max-height: 600px; overflow: auto">
<summary>Response example:</summary>

```json
{
    "success": true,
    "message": "Data berhasil dibuat",
    "data": {
        "name": "Frontend Development",
        "id": 2
    }
}
```
</details>


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
_________________________________________________
Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)
