@extends('layouts.app')
@section('title', __('messages.add_a_post'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.add_a_post') }}</h1>
            </div>
            <div class="card-body show-card">
                <form action="{{ route('forum.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('messages.title') }}</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @if($errors->has('title'))
                            <div class="text-danger mt-2">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('messages.content') }}</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                        @if($errors->has('content'))
                            <div class="text-danger mt-2">{{ $errors->first('content') }}</div>
                        @endif
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary flex-fill">{{ __('messages.publish') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
