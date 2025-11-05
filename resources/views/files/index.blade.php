@extends('layouts.app')
@section('title', __('messages.files_directory'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.files_directory') }}</h1>
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
                <div class="mb-3 text-end">
                    <a href="{{ route('files.create') }}" class="btn btn-primary">{{ __('messages.upload_file') }}</a>
                </div>

                @if($files->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('messages.title') }}</th>
                                <th>{{ __('messages.shared_by') }}</th>
                                <th>{{ __('messages.date') }}</th>
                                <th>{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $file->title[app()->getLocale()] ?? '' }}</td>
                                    <td>{{ $file->user->name }}</td>
                                    <td>{{ $file->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/'.$file->file_path) }}" target="_blank" class="btn btn-sm btn-success">{{ __('messages.download') }}</a>
                                        @if($file->user_id === Auth::id())
                                            <a href="{{ route('files.edit', $file->id) }}" class="btn btn-sm btn-primary">{{ __('messages.edit_post') }}</a>
                                            <form action="{{ route('files.destroy', $file->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.confirm_delete') }}')">{{ __('messages.delete') }}</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $files->links() }}
                    </div>
                @else
                    <p class="text-center">{{ __('messages.no_files_yet') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
