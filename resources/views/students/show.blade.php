@extends('layouts.app')

@section('title', 'View Student')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card page-card">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                        <div>
                            <h1 class="h3 mb-1">{{ $student->full_name }}</h1>
                            <p class="text-body-secondary mb-0">Student details overview.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">Back to List</a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <small class="text-body-secondary d-block mb-1">Student ID</small>
                                <div class="fw-semibold">{{ $student->student_id }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <small class="text-body-secondary d-block mb-1">Email Address</small>
                                <div class="fw-semibold">{{ $student->email }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <small class="text-body-secondary d-block mb-1">Course</small>
                                <div class="fw-semibold">{{ $student->course }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <small class="text-body-secondary d-block mb-1">Year Level</small>
                                <div class="fw-semibold">{{ $student->year_level }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
