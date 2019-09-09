@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
        <form  method="POST" action="{{route('register') }}">
                @csrf
            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" id="name"  name="name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="name">Name</label>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" id="gender" name="gender" class="form-control" placeholder="Gender" required="required">
                    <label for="gender">Gender</label>
                </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of birtd" required="required" autofocus="autofocus">
                            <label for="dob">Date of birth</label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text"id="blood" name="blood" class="form-control" placeholder="Blood" required="required">
                            <label for="blood">Blood Group</label>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text" id="father" name="father" class="form-control" placeholder="Father Name" required="required" autofocus="autofocus">
                            <label for="father">Father Name</label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text" id="mother" name="mother" class="form-control" placeholder="Mother Name" required="required">
                            <label for="mother">Mother name</label>
                        </div>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text"id="present_address"  name="present_address" class="form-control" placeholder="Present Addess" required="required" autofocus="autofocus">
                            <label for="present_address">Present Address</label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                            <input type="text" id="permanent_address"name="permanent_address" class="form-control" placeholder="Permanent Address" required="required">
                            <label for="permanent_address">Permanent Address</label>
                        </div>
                        </div>
                    </div>
            </div>

            <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <div class="form-label-group">
                                <input type="phone"id="phone" name="phone" class="form-control" placeholder="Email address" required="required">
                                <label for="phone" >Phone</label>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                                <label for="inputEmail">Email address</label>
                        </div>
                        </div>
                    </div>
            </div>

            <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <div class="form-label-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                         <label for="password">Password</label>
                     
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-label-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    <label for="password-confirm">Confirm password</label>
                </div>
                </div>
            </div>
            </div>
            
            <button type="submit" class="btn btn-primary form-control">
                Register
            </button>
                    
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="{{route('login')}}">Login Page</a>
            <a class="d-block small" href="{{route('password.request')}}">Forgot Password?</a>
        </div>
        </div>
    </div>
</div>

    {{-- will be delete --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
