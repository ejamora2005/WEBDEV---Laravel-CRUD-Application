@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
    <div class="mb-4">
        <a href="{{ route('students.show', $student) }}" class="link-pill">
            <i class="bi bi-arrow-left" aria-hidden="true"></i>
            <span>Back to Student Profile</span>
        </a>
    </div>

    <div class="row g-4 align-items-start">
        <div class="col-lg-4">
            <aside class="info-panel animate-rise">
                <span class="section-eyebrow text-white-50">Record Update</span>
                <h1 class="display-title h2 mb-3">Edit Student</h1>
                <p class="mb-4">
                    Refresh this profile so the directory reflects the student's latest academic and contact details.
                </p>

                <div class="info-list">
                    <div class="info-item">
                        <h2 class="h6 mb-1">Protect unique details</h2>
                        <p class="mb-0">Student IDs and email addresses stay unique across the whole directory.</p>
                    </div>
                    <div class="info-item">
                        <h2 class="h6 mb-1">Review before saving</h2>
                        <p class="mb-0">A quick pass helps prevent accidental changes to course or year level.</p>
                    </div>
                    <div class="info-item">
                        <h2 class="h6 mb-1">Keep records useful</h2>
                        <p class="mb-0">Small updates here make the list view much easier for everyone to scan.</p>
                    </div>
                </div>
            </aside>
        </div>

        <div class="col-lg-8">
            <div class="form-panel animate-rise delay-1">
                <div class="mb-4">
                    <span class="section-eyebrow">Profile Maintenance</span>
                    <h2 class="h3 mb-2">Update Information</h2>
                    <p class="text-body-secondary mb-0">Adjust the details below, then save the refreshed student record.</p>
                </div>

                <form action="{{ route('students.update', $student) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('students._form', ['buttonLabel' => 'Update Student'])
                </form>
            </div>
        </div>
    </div>
@endsection
