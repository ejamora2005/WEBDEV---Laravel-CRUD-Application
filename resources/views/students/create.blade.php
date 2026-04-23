@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="mb-4">
        <a href="{{ route('students.index') }}" class="link-pill">
            <i class="bi bi-arrow-left" aria-hidden="true"></i>
            <span>Back to Directory</span>
        </a>
    </div>

    <div class="row g-4 align-items-start">
        <div class="col-lg-4">
            <aside class="info-panel animate-rise">
                <span class="section-eyebrow text-white-50">New Record</span>
                <h1 class="display-title h2 mb-3">Add New Student</h1>
                <p class="mb-4">
                    Create a polished student profile with the essentials the team needs for quick tracking and follow-up.
                </p>

                <div class="info-list">
                    <div class="info-item">
                        <h2 class="h6 mb-1">Use the official student ID</h2>
                        <p class="mb-0">This keeps the directory consistent and avoids duplicate records.</p>
                    </div>
                    <div class="info-item">
                        <h2 class="h6 mb-1">Capture a reachable email</h2>
                        <p class="mb-0">School email addresses make future communication much easier.</p>
                    </div>
                    <div class="info-item">
                        <h2 class="h6 mb-1">Keep academic details current</h2>
                        <p class="mb-0">Course and year level help staff scan the directory at a glance.</p>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-lg-8">
            <div class="form-panel animate-rise delay-1">
                <div class="mb-4">
                    <span class="section-eyebrow">Enrollment Profile</span>
                    <h2 class="h3 mb-2">Student Information</h2>
                    <p class="text-body-secondary mb-0">Fill in the details below. All fields are required before saving.</p>
                </div>

                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    @include('students._form', ['buttonLabel' => 'Save Student'])
                </form>
            </div>
        </div>
    </div>
@endsection
