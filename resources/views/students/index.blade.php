@extends('layouts.app')

@section('title', 'Student List')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Student Records</h1>
            <p class="text-body-secondary mb-0">Manage student information from one place.</p>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
    </div>

    <div class="card page-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="py-3">Student ID</th>
                            <th class="py-3">Full Name</th>
                            <th class="py-3">Course</th>
                            <th class="py-3">Year Level</th>
                            <th class="py-3">Email Address</th>
                            <th class="py-3 text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $index => $student)
                            <tr>
                                <td class="px-4">{{ $students->firstItem() + $index }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td class="fw-semibold">{{ $student->full_name }}</td>
                                <td>{{ $student->course }}</td>
                                <td>{{ $student->year_level }}</td>
                                <td>{{ $student->email }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2 flex-wrap justify-content-end">
                                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-body-secondary">
                                    No student records found. Add your first student to get started.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $students->links() }}
    </div>
@endsection
