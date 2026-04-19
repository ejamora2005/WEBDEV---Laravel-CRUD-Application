<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_students_index_page_displays_existing_records(): void
    {
        $student = Student::factory()->create([
            'full_name' => 'Jane Doe',
        ]);

        $response = $this->get(route('students.index'));

        $response->assertOk();
        $response->assertSee($student->full_name);
    }

    public function test_user_can_create_a_student_record(): void
    {
        $response = $this->post(route('students.store'), [
            'student_id' => 'SID-1001',
            'full_name' => 'John Smith',
            'course' => 'BS Information Technology',
            'year_level' => '2nd Year',
            'email' => 'john.smith@example.com',
        ]);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', [
            'student_id' => 'SID-1001',
            'full_name' => 'John Smith',
        ]);
    }

    public function test_user_can_update_a_student_record(): void
    {
        $student = Student::factory()->create();

        $response = $this->put(route('students.update', $student), [
            'student_id' => $student->student_id,
            'full_name' => 'Updated Student Name',
            'course' => 'BS Computer Science',
            'year_level' => '4th Year',
            'email' => $student->email,
        ]);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'full_name' => 'Updated Student Name',
            'course' => 'BS Computer Science',
            'year_level' => '4th Year',
        ]);
    }

    public function test_user_can_delete_a_student_record(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('students.destroy', $student));

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseMissing('students', [
            'id' => $student->id,
        ]);
    }
}
