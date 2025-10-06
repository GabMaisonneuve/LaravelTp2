@extends('layouts.app')

@section('title', 'Students')

@section('content')
<h1 class="page-title">Students</h1>

<div class="row">
    @forelse($students as $student)
        <div class="col-md-6 mb-4">
            <div class="card student-card shadow-sm">
                <div class="card-header bg-custom">
                    <h5 class="card-title text-white mb-0">{{ $student->nom }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>📞 Phone: </strong> {{ $student->telephone }}</li>
                        <li><strong>📩 Email: </strong> {{ $student->email }}</li>
                    </ul>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-custom">View</a>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-danger">There are no students to display</div>
    @endforelse
    {{ $students }}
</div>
@endsection
