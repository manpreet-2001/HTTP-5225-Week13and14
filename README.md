# 🎓 Laravel Student Management System

A complete Laravel application for managing students, courses, and professors with full CRUD operations, database relationships, and error handling.

## 🖼️ Screenshots

### 🏠 Homepage & Navigation
<img src="screenshots/main-pages/welcome.png" width="800" alt="Homepage">

### �� Student Management
<img src="screenshots/main-pages/students-index.png" width="800" alt="Students List">

### �� Course Management
<img src="screenshots/main-pages/courses-index.png" width="800" alt="Courses List">

---

## ✨ Features

- **Complete CRUD**: Students, Courses, and Professors management
- **Database Relationships**: Many-to-many (Students↔Courses), One-to-one (Professor↔Course)
- **Error Handling**: Form validation, try-catch blocks, user feedback
- **Clean UI**: Basic CSS styling with responsive design
- **Course Enrollment**: Checkbox-based course selection for students

---

## 🚀 Quick Start

### **Prerequisites**
- PHP 8.1+, Composer, MySQL, Laravel 12.x

### **Installation**
```bash
git clone https://github.com/manpreet-2001/HTTP-5225-Week13and14.git
cd HTTP-5225-Week13and14
composer install
cp .env.example .env
php artisan key:generate
```

### **Database Setup**
```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

Visit `http://localhost:8000`

---

## 📊 Database Schema

- **Students**: `id`, `fname`, `lname`, `email`, `timestamps`
- **Courses**: `id`, `name`, `description`, `professor_id`, `timestamps`
- **Professors**: `id`, `name`, `timestamps`
- **Pivot Table**: `course_student` for enrollments


---

## 🔗 Routes

- **Students**: `/students` (CRUD operations)
- **Courses**: `/courses` (CRUD operations)
- **Professors**: `/professors` (View list)

---

## 👨‍💻 Developer

**Manpreet Singh** - HTTP-5225 Week 13 & 14 Assessment

---
