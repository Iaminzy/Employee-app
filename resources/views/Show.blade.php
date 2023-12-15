@extends('layouts.app')
@section('title','show details')

@section('content')
<div class="card mt-5">
    <div class="row py-3 px-3">
        <div class="col-md-6">
            <img src="{{ asset('/storage/uploads/' . $employee->Image) }}" alt="Employee Image" style="border-radius:8px;width:500px;height:415px;">
        </div>

        <div class="col-md-6" style="border-left: 1px solid black">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->id}} disabled >
                
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Name}} disabled >
                
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Age}} disabled >   
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Email}} disabled >  
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Phone}} disabled > 
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Gender}} disabled >   
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="Name" class="form-control" value={{$employee->Jdate}} disabled >   
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                </div>
                <input type="text" name="Name" class="form-control {{$employee->Status == 'Active'? 'text-success':'text-danger' }}" value={{$employee->Status}} disabled >   
            </div>
            
        </div>
        
    </div> 
</div>



@endsection