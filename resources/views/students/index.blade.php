@extends('layouts.app')

@section('title', 'Student List')

@section('content')
    @php
        $summaryCards = [
            ['value' => $summary['total_students'], 'label' => 'Total Students', 'note' => 'Profiles currently tracked'],
            ['value' => $summary['programs'], 'label' => 'Programs', 'note' => 'Distinct courses represented'],
            ['value' => $summary['year_levels'], 'label' => 'Year Levels', 'note' => 'Academic stages on file'],
            ['value' => $summary['pages'], 'label' => 'Pages', 'note' => 'Directory pages available'],
        ];
    @endphp

    <section class="hero-panel animate-rise mb-4 mb-lg-5">
        <div class="row g-4 align-items-end">
            <div class="col-lg-7">
                <span class="section-eyebrow text-white-50">Campus Directory</span>
                <h1 class="display-title mb-3">Student Records</h1>
                <p class="hero-copy mb-0">
                    Organize student profiles, keep academic details current, and make everyday record updates feel clean and effortless.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="hero-actions">
                    <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-person-plus-fill" aria-hidden="true"></i>
                        <span>Add New Student</span>
                    </a>
                    <a href="#directory-table" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-grid-1x2-fill" aria-hidden="true"></i>
                        <span>Browse Directory</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-2">
            @foreach ($summaryCards as $card)
                <div class="col-6 col-xl-3">
                    <div class="metric-card">
                        <span class="metric-label">{{ $card['label'] }}</span>
                        <strong class="metric-value">{{ $card['value'] }}</strong>
                        <span class="metric-note">{{ $card['note'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="directory-table" class="directory-card animate-rise delay-1">
        <div class="table-toolbar">
            <div>
                <span class="section-eyebrow">Directory Overview</span>
                <h2 class="h3 mb-1">Student List</h2>
                <p class="text-body-secondary mb-0">Each row is ready for quick review, editing, or cleanup.</p>
            </div>
            <span class="soft-badge">{{ $students->total() }} total records</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="px-4">#</th>
                        <th>Profile</th>
                        <th>Student ID</th>
                        <th class="course-col">Course</th>
                        <th>Year Level</th>
                        <th>Email Address</th>
                        <th class="text-end pe-4 actions-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $index => $student)
                        @php
                            $initials = collect(preg_split('/\s+/', trim($student->full_name)))
                                ->filter()
                                ->take(2)
                                ->map(fn ($segment) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($segment, 0, 1)))
                                ->implode('');
                        @endphp
                        <tr>
                            <td class="px-4 text-body-secondary fw-semibold">{{ $students->firstItem() + $index }}</td>
                            <td>
                                <div class="student-cell">
                                    <span class="student-avatar">{{ $initials }}</span>
                                    <div class="meta-stack">
                                        <span class="fw-semibold">{{ $student->full_name }}</span>
                                        <span class="muted-copy">Student profile</span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="mono-id">{{ $student->student_id }}</span></td>
                            <td class="course-col"><span class="inline-chip course-chip">{{ $student->course }}</span></td>
                            <td><span class="inline-chip is-neutral">{{ $student->year_level }}</span></td>
                            <td>
                                <a href="mailto:{{ $student->email }}" class="table-link">{{ $student->email }}</a>
                            </td>
                            <td class="text-end pe-4 actions-cell">
                                <div class="action-group d-inline-flex justify-content-end">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye-fill" aria-hidden="true"></i>
                                        <span>View</span>
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Delete this student record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash3-fill" aria-hidden="true"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="empty-state">
                                    <span class="student-avatar mx-auto mb-3">+</span>
                                    <h3 class="h5 mb-2">No student records yet</h3>
                                    <p class="text-body-secondary mb-0">Create your first profile to start building the directory.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div class="mt-4 pt-2">
        {{ $students->links() }}
    </div>
@endsection
