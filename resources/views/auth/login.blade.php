@extends('layouts.app')
@section('title', __('messages.login'))

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ __('messages.login') }}</h1>
    <form method="POST" action="{{ route('login') }}" class="mx-auto" style="max-width:400px;">
        @csrf
        <div class="mb-3">
            <label>{{ __('messages.email') }}</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('messages.password') }}</label>
            <input type="password" name="password" class="form-control">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">{{ __('messages.login') }}</button>
        <div class="mt-3 text-center">
            <a href="{{ route('register') }}">{{ __('messages.create_account') }}</a>
        </div>
    </form>
</div>
@endsection
