@extends('layouts.app')
@section('title', __('messages.student_info'))
@section('content')

<h1 class="text-center">{{ __('messages.student_info') }}</h1>
<div class="row justify-content-center">

    <div class="col-md-6">
        <div class="card mb-4 show-card">
            <div class="card-header justify-content-between d-flex align-items-center">
                <h5 class="card-title">{{ $student->nom }}</h5>
                <a href="{{ route('student.index') }}" class="btn btn-primary">{{ __('messages.go_back') }} ◀️</a>
            </div>
            <div class="card-body">
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><strong>{{ __('messages.address') }}: </strong>{{ $student->adresse }}</li>
                    <li><strong>{{ __('messages.phone') }}: </strong>{{ $student->telephone }}</li>
                    <li><strong>{{ __('messages.email') }}: </strong>{{ $student->email }}</li>
                    <li><strong>{{ __('messages.birth_date') }}: </strong>{{ $student->date_naissance }}</li>
                    <li><strong>{{ __('messages.city') }}: </strong>{{ $student->city->nom }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between gap-2">
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-custom flex-fill">{{ __('messages.edit_student') }}</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-custom-danger flex-fill" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        {{ __('messages.delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">{{ __('messages.delete') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
      </div>
      <div class="modal-body">
        {{ __('messages.confirm_delete_student') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
        <form method="post" action="{{ route('student.destroy', $student->id) }}">
            @csrf
            @method('delete')
            <input type="submit" value="{{ __('messages.delete') }}" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
