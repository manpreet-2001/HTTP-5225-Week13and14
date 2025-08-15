<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Student;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing data
        $courses = Course::all();
        $professors = Professor::all();
        $students = Student::all();

        if ($courses->count() > 0 && $professors->count() > 0) {
            // Assign professors to courses (one-to-one) - only if not already assigned
            foreach ($courses as $index => $course) {
                if (!$course->professor_id && $professors->count() > $index) {
                    $course->update(['professor_id' => $professors[$index]->id]);
                }
            }
        }

        if ($courses->count() > 0 && $students->count() > 0) {
            // Enroll students in courses (many-to-many) - only if not already enrolled
            foreach ($students as $student) {
                $enrolledCourseIds = $student->courses->pluck('id')->toArray();
                $availableCourses = $courses->whereNotIn('id', $enrolledCourseIds);
                
                if ($availableCourses->count() > 0) {
                    // Each student enrolls in 1-2 random available courses
                    $randomCourses = $availableCourses->random(rand(1, min(2, $availableCourses->count())));
                    $student->courses()->attach($randomCourses->pluck('id'));
                }
            }
        }

        $this->command->info('Relationships established successfully!');
    }
}
