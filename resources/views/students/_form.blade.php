@php
    $yearLevels = ['1st Year', '2nd Year', '3rd Year', '4th Year'];
@endphp

@if ($errors->any())
    <div class="alert alert-danger rounded-4 border-0 mb-4">
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-section">
    <div class="form-section-label">Identity</div>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="student_id" class="form-label">Student ID</label>
            <input
                type="text"
                class="form-control @error('student_id') is-invalid @enderror"
                id="student_id"
                name="student_id"
                value="{{ old('student_id', $student->student_id ?? '') }}"
                placeholder="2026-00123"
                required
            >
            <div class="form-note">Use the official identifier assigned by the school.</div>
            @error('student_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email Address</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email', $student->email ?? '') }}"
                placeholder="student@example.edu"
                required
            >
            <div class="form-note">A unique email helps staff follow up quickly.</div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-section mt-4">
    <div class="form-section-label">Profile</div>
    <div class="row g-3">
        <div class="col-12">
            <label for="full_name" class="form-label">Full Name</label>
            <input
                type="text"
                class="form-control @error('full_name') is-invalid @enderror"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $student->full_name ?? '') }}"
                placeholder="Enter the student's full name"
                required
            >
            <div class="form-note">Write the name exactly as it should appear in the directory.</div>
            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="course" class="form-label">Course</label>
            <input
                type="text"
                class="form-control @error('course') is-invalid @enderror"
                id="course"
                name="course"
                value="{{ old('course', $student->course ?? '') }}"
                placeholder="BS Information Technology"
                required
            >
            <div class="form-note">Enter the program or course currently enrolled.</div>
            @error('course')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="year_level" class="form-label">Year Level</label>
            <select
                class="form-select @error('year_level') is-invalid @enderror"
                id="year_level"
                name="year_level"
                required
            >
                <option value="">Select year level</option>
                @foreach ($yearLevels as $yearLevel)
                    <option value="{{ $yearLevel }}" @selected(old('year_level', $student->year_level ?? '') === $yearLevel)>
                        {{ $yearLevel }}
                    </option>
                @endforeach
            </select>
            <div class="form-note">Choose the current academic standing of the student.</div>
            @error('year_level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-floppy-fill" aria-hidden="true"></i>
        <span>{{ $buttonLabel }}</span>
    </button>
    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-x-circle-fill" aria-hidden="true"></i>
        <span>Cancel</span>
    </a>
</div>
