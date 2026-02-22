# Laravel Practical Application

A Laravel-based practical project implementing **User Management (CRUD)** along with utility features like **CSV Export**, **Audio Play Time Calculation**, and **Distance Calculation between Locations**.

This project demonstrates clean architecture using **Controller → Service → Model** flow and follows Laravel best practices.

---

## Project Features

### User Management

* Create User
* Edit User
* Delete User
* Display User List
* Profile Image Upload
* Form Validation
* Password Hashing
* CSV Export

### Utility Modules

* Audio File Play Time Calculator
* Distance Calculator (Latitude & Longitude)

---

## Project Architecture

The project follows a layered architecture:

```
Request
   ↓
Controller
   ↓
Service Layer (Business Logic)
   ↓
Model (Eloquent ORM)
   ↓
Database
```

### Why Service Layer?

* Keeps controllers clean
* Separates business logic
* Improves scalability
* Easy testing & maintenance

---

## Project Structure

```
app/
 ├── Http/
 │   ├── Controllers/
 │   │      UserController.php
 │   │      AudioController.php
 │   │      DistanceController.php
 │   └── Requests/
 │          StoreUserRequest.php
 │          UpdateUserRequest.php
 │
 ├── Models/
 │      User.php
 │
 └── Services/
        UserService.php

resources/views/
 ├── users/
 ├── audio/
 └── distance/
```

---

## Project Flow

### User Module Flow

```
Form Submission
      ↓
Validation Request
      ↓
Controller
      ↓
UserService (Business Logic)
      ↓
Model
      ↓
Database
```

---

## Technology Stack

* PHP 8+
* Laravel 12+
* MySQL
* Blade Template Engine
* Bootstrap (optional UI)
* getID3 Library (Audio Metadata)

---

## Installation & Setup

### Clone Repository

```
git clone https://github.com/your-username/laravel-practical-app.git
cd laravel-practical-app
```

---

### Install Dependencies

```
composer install
```

---

### Create Environment File

```
cp .env.example .env
```

---

### Configure Database

Update `.env`:

```
DB_DATABASE=practical_app
DB_USERNAME=root
DB_PASSWORD=
```

Create database manually in MySQL.

---

### Generate Application Key

```
php artisan key:generate
```

---

### Run Migration

```
php artisan migrate
```

---

### Storage Link (Important)

```
php artisan storage:link
```

---

### Run Application

```
php artisan serve
```

Open:

```
http://127.0.0.1:8000
```

---

## CSV Export

Users can export all records into a CSV file using:

```
/users-export
```

The downloaded file is Excel compatible.

---

## Audio Play Time Feature

Upload an audio file to calculate duration.

Supported formats:

* MP3
* WAV
* AAC

Library Used:

```
james-heinrich/getid3
```

---

## Distance Calculator

Calculates distance between two geographic coordinates using the **Haversine Formula**.

Output:

* Distance in Kilometers (KM)

---

## Validation Rules

| Field       | Validation           |
| ----------- | -------------------- |
| Name        | a-z A-Z only         |
| Email       | Unique & valid       |
| Mobile      | Exactly 10 digits    |
| Profile Pic | PNG/JPG/JPEG         |
| Password    | Minimum 6 characters |

---

## File Storage

Uploaded images are stored in:

```
storage/app/public/profiles
```

Accessible via:

```
public/storage
```

---
