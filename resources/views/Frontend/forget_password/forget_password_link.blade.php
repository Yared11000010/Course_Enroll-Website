@extends('Frontend.layouts.main')
@section('content')
<style>
    .form { width:485px; margin:0 auto }

</style>
<div id="about" class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="p-4 form bg-light justify-content-center">
                <h1  class=" justify-content-center text-center" style="color:rgb(0,33,71);">RESET PASSWORD </h1>
                <form id="loginForm" action="{{ route('user-resetPasswordPost') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <label for="email_address" class="col-md-4 col-form-label ">Email</label>
                        <div class="col-12">
                            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label ">Password</label>
                        <div class="col-12">
                            <input type="password" id="password" class="form-control" name="password" id="new_password" required autofocus>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label">Confirm Password</label>
                        <div class="col-12">
                            <input type="password" id="password-confirm" class="form-control" id="confirm_password" name="password_confirmation" required autofocus>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <br>
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </form>
        </div>
        </div>
    </div>
</div>
@endsection
