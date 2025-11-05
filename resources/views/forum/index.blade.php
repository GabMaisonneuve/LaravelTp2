@extends('layouts.app')
@section('title', __('messages.forum'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.forum_posts') }}</h1>
            </div>
            <div class="card-body show-card">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="mb-4 p-3 border rounded">
                            <h3>{{ $post->title[app()->getLocale()] ?? '' }}</h3>
                            <p>{{ $post->content[app()->getLocale()] ?? '' }}</p>
                            <small class="text-muted">
                                {{ __('messages.posted_by') }} {{ $post->user->name }} –
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                            @if ($post->user_id === Auth::id())
                                <div class="mt-2">
                                    <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-sm btn-primary">{{ __('messages.edit_post') }}</a>
                                    <form action="{{ route('forum.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.confirm_delete_post') }}')">{{ __('messages.delete') }}</button>
                                    </form>
                                    
                                    
                                </div>
                             
                            @endif
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center">
                        {{ $posts->links() }}
                    </div>
                @else
                    <p class="text-center">{{ __('messages.no_posts_yet') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
