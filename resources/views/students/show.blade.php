@extends('layouts.app')

@section('title', 'View Student')

@section('content')
    @php
        $initials = collect(preg_split('/\s+/', trim($student->full_name)))
            ->filter()
            ->take(2)
            ->map(fn ($segment) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($segment, 0, 1)))
            ->implode('');
    @endphp

    <section class="profile-hero animate-rise mb-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-8">
                <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                    <span class="profile-avatar">{{ $initials }}</span>
                    <div>
                        <span class="section-eyebrow text-white-50">Student Profile</span>
                        <h1 class="display-title h2 mb-2">{{ $student->full_name }}</h1>
                        <div class="profile-tags">
                            <span class="profile-tag">{{ $student->course }}</span>
                            <span class="profile-tag">{{ $student->year_level }}</span>
                            <span class="profile-tag">{{ $student->student_id }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="d-flex flex-wrap gap-2 justify-content-lg-end">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-light">
                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                        <span>Edit Student</span>
                    </a>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left" aria-hidden="true"></i>
                        <span>Back to List</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="page-card p-4 p-lg-5 animate-rise delay-1">
                <div class="mb-4">
                    <span class="section-eyebrow">Record Snapshot</span>
                    <h2 class="h3 mb-2">Directory Details</h2>
                    <p class="text-body-secondary mb-0">A clean, readable view of the student information currently saved in the system.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="detail-card">
                            <span class="detail-label">Student ID</span>
                            <div class="detail-value mono-id">{{ $student->student_id }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-card">
                            <span class="detail-label">Email Address</span>
                            <div class="detail-value">{{ $student->email }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-card">
                            <span class="detail-label">Course</span>
                            <div class="detail-value">{{ $student->course }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-card">
                            <span class="detail-label">Year Level</span>
                            <div class="detail-value">{{ $student->year_level }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <aside class="contact-panel animate-rise delay-2">
                <span class="section-eyebrow">Quick Contact</span>
                <h2 class="h4 mb-3">Reach Out Fast</h2>
                <p class="text-body-secondary">
                    Use the registered school email whenever you need to coordinate updates or follow-up communication.
                </p>
                <a href="mailto:{{ $student->email }}" class="link-pill">
                    <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                    <span>{{ $student->email }}</span>
                </a>

                <div class="contact-divider"></div>

                <span class="detail-label">Profile Status</span>
                <div class="fw-semibold">Active in directory</div>
                <p class="small text-body-secondary mb-0 mt-2">
                    Keep this record refreshed as the student progresses through each academic year.
                </p>
            </aside>
        </div>
    </div>
@endsection
