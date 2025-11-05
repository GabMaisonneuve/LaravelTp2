@extends('layouts.app')
@section('title', __('messages.edit_post'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.edit_post') }}</h1>
            </div>
            <div class="card-body show-card">
                <form action="{{ route('forum.update', $forumPost->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('messages.title') }}</label>
                    <input type="text" class="form-control" id="title" name="title_en" value="{{ old('title_en', $forumPost->title['en'] ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">{{ __('messages.content') }}</label>
                    <textarea class="form-control" id="content" name="content_en" rows="5">{{ old('content_en', $forumPost->content['en'] ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
