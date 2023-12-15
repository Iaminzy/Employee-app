@extends('layouts.app')
@section('title', 'Home')
@section('content')
@if (session()->has('message'))
    
    <div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
        <span aria-hidden="true">&times; {{session()->get('message')}}</span>
    <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close"></button>
</div>
    
@endif



    <div class="row justify-content-center mt-5">

      <!-- Form Card -->
      <div class="col-md-6">
        <div class="card form-container">
          <div class="card-body">
            <form>
             
                <a href="{{ route('employee.create') }}" class="btn btn-success btn-block">
                    <i class="fas fa-user-plus"></i> Create Employees
                </a>
                  
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="row justify-content-center mt-2">

      <!-- Employee Details Card -->
      <div class="col-md-12">
        <div class="card table-container">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Employee Details</h2>
            <table class="table  border-info  table-hover align-content-md-center">
              <thead class="border-primary" >
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Joinded At</th>
                  <th>Status</th>
                  <th>Profile</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $key => $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->Name}}</td>
                    <td>{{$employee->Age}}</td>
                    <td>{{$employee->Gender}}</td>
                    <td>{{$employee->Email}}</td>
                    <td>{{$employee->Phone}}</td>
                    <td>{{$employee->Jdate}}</td>
                    <td>{{$employee->Status}}</td>
                    <td>
                        <img src="{{ asset('/storage/uploads/' . $employee->Image) }}" alt="Employee Image" style="border-radius:50%;width:65px">

                       
                    <td>
                        <a href="{{route('employee.show',$employee->id)}}" class=""><i class="fas fa-eye"></i></a>
                        <a href="{{route('employee.edit',$employee->id)}}"> <i class="fas fa-pencil-alt"></i></a>
                        
                        <form action="{{route('employee.destroy',$employee->id)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm py-0"><i class="fa fa-trash " aria-hidden=""></i></button>
                      </form>
                    </td>
                </tr>
        
                <!-- Add more rows for additional employees -->
              </tbody>
              @endforeach
            </table>
            {{$employees->links()}}
           
          </div>
        </div>
      </div>

    </div>
 
@endsection