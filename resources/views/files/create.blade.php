@extends('layouts.app')
@section('title', __('messages.upload_file'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.upload_file') }}</h1>
            </div>
            <div class="card-body show-card">
                @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
                 @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('messages.title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">{{ __('messages.select_file') }}</label>
                        <input type="file" class="form-control" id="file" name="file" required>
                        <small class="text-muted">PDF, DOC, DOCX, ZIP (max 10MB)</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.upload') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
