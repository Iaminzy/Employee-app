@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div> 

                <div class="card-body">
                    @if( auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                        <div class="panel-heading">Normal</div>  
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

@endsection
