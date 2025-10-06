@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header background-gradient">
                    <h1 class="card-title text-center">Edit</h1>
                </div>
                <div class="card-body show-card">
                    <form action="{{ route('student.update', $student->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nom" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom', $student->nom ?? '')}}">
                            @if($errors->has('nom'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('nom')}}
                                </div>            
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email', $student->email ?? '')}}">
                            @if($errors->has('email'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                </div>            
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $student->telephone ?? '')}}">
                            @if($errors->has('telephone'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('telephone')}}
                                </div>            
                            @endif
                        </div>
                          <div class="mb-3">
                            <label for="adresse" class="form-label">Address</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{old('adresse', $student->adresse ?? '')}}">
                            @if($errors->has('adresse'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('adresse')}}
                                </div>            
                            @endif
                        </div>
                      <div class="mb-3">
                            <label for="city_id">City</label>
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
                            <label for="date_naissance" class="form-label">Birth date</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{old('date_naissance', $student->date_naissance ?? '')}}">
                            @if($errors->has('date_naissance'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('date_naissance')}}
                                </div>            
                            @endif
                        </div>
                        <div class="d-flex">
                        <button type="submit" class="btn btn-primary flex-fill">Save</button>
                        </div>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection('content')