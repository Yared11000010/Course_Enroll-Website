@extends('Frontend.layouts.main')
@section('content')
<style>
    .form { width:485px; margin:0 auto }

</style>
<div id="about" class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="p-4 form bg-light justify-content-center">
                <h1  class=" justify-content-center text-center" style="color:rgb(0,33,71);">LOGIN </h1>
            <form method="POST" action="{{ route('userlogin') }}">
                    @csrf
                <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn events-form-btn ">Login</button>
                <p><a href="{{ url('user/forget-password') }}" >Forget your password</a> </p>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
