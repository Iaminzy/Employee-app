@extends('layouts.app')

@section('title', 'create')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7 mt-5 bg-dark" style="border-radius: 7px">
        <h1 class="text-center font-weight-bold text-primary">Create Employees</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="{{ route('employee.store') }}" method="post" id="form-box" class="p-4" enctype="multipart/form-data">
            @csrf

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="Name" class="form-control {{ $errors->has('Name') ? 'is-invalid' : '' }}" placeholder="Enter your name"  value="{{ old('Name') }}">
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
                <input type="number" name="age" class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" placeholder="Enter your Age"  value="{{ old('age') }}">
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
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter your email"  value="{{ old('email') }}">
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
                    <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Enter your Phone Number"  value="{{ old('phone') }}">
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
                            <input class="form-check-input ms-3" type="radio" name="gender" id="male" value="male" required {{ old('gender') == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label text-light" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input ms-3" type="radio" name="gender" id="female" value="female" required {{ old('gender') == 'female' ? 'checked' : '' }}>
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
                        <input id="jdate" type="date" name="jdate" class="form-control {{ $errors->has('jdate') ? 'is-invalid' : '' }}" placeholder="Enter Joined Date"  value="{{ old('jdate') }}">
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
                        <select name="status" class="custom-select {{ $errors->has('status') ? 'is-invalid' : '' }}" ">
                            <option value="Select Status">Active</option>
                            <option value="Active">Active</option>
                            <option value="Dective">Dective</option>
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
                            <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image" name="image"  >
                            <label class="custom-file-label" for="image">Choose an image</label>
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif

                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <img id="preview" src="" alt="your image" width="80px" height="80px" class="mt-3" style="display:none;border-radius:50%;"/>
            </div>

            
            <div class="form-group">
                <button id="submit" class="btn btn-success btn-block col-md-6 mx-auto">Save</button>
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
