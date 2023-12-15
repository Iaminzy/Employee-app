@extends('layouts.app')
@section('title','Edite ')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 mt-5 bg-dark" style="border-radius: 7px">
        <h1 class="text-center font-weight-bold text-primary">Edit Employees</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{ route('employee.update',  $employee->id) }}" method="post" class="p-4" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="Name" class="form-control {{ $errors->has('Name') ? 'is-invalid' : '' }}" placeholder="Enter your name"  value=" {{$employee->Name}}">
                @if ($errors->has('Name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                </div>
                <input type="number" name="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" placeholder="Enter your Age"  value="{{ $employee->Age }}">
                @if ($errors->has('age'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('age') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-row">
                <div class="form-group input-group col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter your email"  value="{{ $employee->Email }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group input-group col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Enter your Phone Number"  value="{{ $employee->Phone }}">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ms-3" type="radio" name="gender" id="male" value="male" required {{ $employee->Gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ms-3" type="radio" name="gender" id="female" value="female" required {{ $employee->Gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="female">Female</label>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input id="jdate" type="date" name="jdate" class="form-control {{ $errors->has('jdate') ? 'is-invalid' : '' }}" placeholder="Enter Joined Date"  value="{{$employee->Jdate }}">
                        @if ($errors->has('jdate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jdate') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        </div>
                        <select name="status" class="custom-select {{ $errors->has('status') ? 'is-invalid' : '' }}" >
                            <option value="Active" {{$employee->Status=='Active'?'selected':''}}>Active</option>
                            <option value="Dective" {{$employee->Status=='Dective'?'selected':''}}>Dective</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="imageInput" name="image"  >
                            <label class="custom-file-label" for="image">{{$employee->Image}}</label>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif

                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3" style="display: flex; align-items: center;">
                @if(isset($employee->Image))
                    <img src="{{ asset('/storage/uploads/' . $employee->Image) }}" alt="Employee Image" style="border-radius: 50%; margin-right: 10px;" width="80px">
                @endif
                <img id="preview" src="#" alt="your image" width="80px" height="80px" style="border-radius: 50%; display: none">
            </div>
            
            

            
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3 mx-3">Update</button>
                <button type="reset" class="btn btn-danger mt-3 px-5">Clear</button>
            </div>

            
           
    
        
        </form>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
          <script>
                $(document).ready(function () {
                    // Add event listener to file input
                    $('#image').change(function () {
                        // Get the file name
                        var fileName = $(this).val().split('\\').pop();
                        // Display the file name in the label
                        $('.custom-file-label').text(fileName);
                    });
                });

        $(document).ready(function () {
        // Check if the date input is supported
        if (Modernizr.inputtypes.date) {
            // The date input is supported
            $('#jdate').attr('placeholder', 'Enter Joined Date');
        } else {
            // Fallback for unsupported browsers
            $('#jdate').before('<label for="jdate" class="placeholder">Enter Joined Date</label>');
        }

        // Show/hide the placeholder label based on input focus
        $('#jdate').focus(function () {
            $('.placeholder').hide();
        });

        $('#jdate').blur(function () {
            if (!$(this).val()) {
                $('.placeholder').show();
            }
        });
    });
           
    $(document).ready(function () {
        // Change event for the file input
        $('#imageInput').change(function () {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Display the preview image
                    $('#preview').attr('src', e.target.result).show();
                    // Hide the current image if it exists
                    $('#currentImage').hide();
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    });  




         image.onchange = evt => {
              preview = document.getElementByid('preview');
              preview.style.display = 'block';
              const [file] = image.files
              if (file) {
                preview.src = URL.createObjectURL(file)
              }
        }  
                  
  </script>
            
            

    </div>
</div>
@endsection

