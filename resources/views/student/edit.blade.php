@extends('layouts.app')
@section('title', __('messages.edit_student'))
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header background-gradient">
                <h1 class="card-title text-center">{{ __('messages.edit_student') }}</h1>
            </div>
            <div class="card-body show-card">
                <form action="{{ route('student.update', $student->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                               value="{{ old('nom', $student->nom ?? '') }}">
                        @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email', $student->email ?? '') }}">
                        @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">{{ __('messages.phone') }}</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone"
                               value="{{ old('telephone', $student->telephone ?? '') }}">
                        @if($errors->has('telephone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('telephone') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="adresse" class="form-label">{{ __('messages.address') }}</label>
                        <input type="text" class="form-control" id="adresse" name="adresse"
                               value="{{ old('adresse', $student->adresse ?? '') }}">
                        @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="city_id" class="form-label">{{ __('messages.city') }}</label>
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    @if(old('city_id', $student->city_id) == $city->id) selected @endif>
                                    {{ $city->nom }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('city_id'))
                            <div class="text-danger mt-2">{{ $errors->first('city_id') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="date_naissance" class="form-label">{{ __('messages.birth_date') }}</label>
                        <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                               value="{{ old('date_naissance', $student->date_naissance ?? '') }}">
                        @if($errors->has('date_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_naissance') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary flex-fill">{{ __('messages.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
