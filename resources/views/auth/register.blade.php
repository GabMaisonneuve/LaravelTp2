@extends('layouts.app')
@section('title', __('messages.register'))

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ __('messages.register') }}</h1>
    <form method="POST" action="{{ route('register') }}" class="mx-auto" style="max-width:400px;">
        @csrf
        <div class="mb-3">
            <label>{{ __('messages.name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
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
        <div class="mb-3">
            <label>{{ __('messages.confirm_password') }}</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-success w-100">{{ __('messages.register') }}</button>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">{{ __('messages.already_have_account') }}</a>
        </div>
    </form>
</div>
@endsection
