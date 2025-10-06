@extends('layouts.app')
@section('title', 'Task')
@section('content')

<h1 class="text-center">Student's information</h1>
 <div class="row justify-content-center">

    <div class="col-md-6">
        <div class="card mb-4 show-card">
            <div class="card-header justify-content-between d-flex align-items-center  ">
              <h5 class="card-title">{{$student->nom}}</h5>
              <a href="{{ route('student.index') }}" class="btn btn-primary">Go back ◀️</a>
            </div>
            <div class="card-body">
                <ul class="list-unstyled d-flex justifty-content-between flex-column gap-3">
                    <li><strong>Address: </strong>{{$student->adresse }}</li>
                    <li><strong>Phone number: </strong>{{$student->telephone }}</li>
                    <li><strong>Email: </strong>{{$student->email }}</li>
                    <li><strong>Birth date: </strong>{{$student->date_naissance }}</li>
                    <li><strong>City: </strong>{{$student->city->nom }}</li>
                </ul>

            </div>
            <div class="card-footer ">
                <div class="d-flex justify-content-between gap-2">
                  <a href="{{ route('student.edit', $student->id) }}" class=" btn btn-custom flex-fill">Edit</a>

                   
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-custom-danger flex-fill" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

 </div>

 <!-- modal -->



<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this student? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post" action="{{ route('student.destroy', $student->id) }}">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')