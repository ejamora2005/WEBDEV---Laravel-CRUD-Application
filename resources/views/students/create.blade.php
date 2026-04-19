@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card page-card">
                <div class="card-body p-4 p-md-5">
                    <div class="mb-4">
                        <h1 class="h3 mb-1">Add New Student</h1>
                        <p class="text-body-secondary mb-0">Enter the student information below.</p>
                    </div>

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        @include('students._form', ['buttonLabel' => 'Save Student'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
