@extends('layouts.app')

@section('css')
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font.min.css') }}">
@endsection

@section('content')
<!-- Sign up form -->
    <section class="signup bg-dark ">
        <div class="container col-md-6">
            <div class="signup-content ">
                <div class="signup-form col-5 ">
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="email" ><i class="fa-solid fa-envelope"></i></label>
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}"  />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass"> <i class="fa-solid fa-unlock-keyhole"></i> </label>
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" name="password" id="password" placeholder="Password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        

                        <div class="form-group form-button ">
                            <button type="submit" class="btn  btn-primary mx-auto" style="margin-top:20px; width: 150px; height: 40px;">
                                {{ __('Login') }}
                            </button>
                           
                        </div>

                    </form>
                </div>
                <div class="col-md-6 ">
                    <div class="signup-image ">
                        <figure><img src="{{ asset('/uploads/user.jpg')}}" width="1500px" height="400px" alt="sing up image" style="border-radius:50%~ "></figure>
                     </div>
                </div>
                
            </div>
        </div>
    </section>
   
    <script src="https://kit.fontawesome.com/d7d0b3db86.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+GtjzkgbK7uO2f5j5z6ksZl5vD6Q6z5r5a9+Z7c5CfP5M6q2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection

<div class="col-md-6 bg-dark">
    
</div>


